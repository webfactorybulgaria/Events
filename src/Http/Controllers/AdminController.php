<?php

namespace TypiCMS\Modules\Events\Http\Controllers;

use TypiCMS\Modules\Core\Shells\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Events\Shells\Http\Requests\FormRequest;
use TypiCMS\Modules\Events\Shells\Models\Event;
use TypiCMS\Modules\Events\Shells\Repositories\EventInterface;

class AdminController extends BaseAdminController
{
    public function __construct(EventInterface $event)
    {
        parent::__construct($event);
    }

    /**
     * List models.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        return view('events::admin.index');
    }

    /**
     * Create form for a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = $this->repository->getModel();

        return view('events::admin.create')
            ->with(compact('model'));
    }

    /**
     * Edit form for the specified resource.
     *
     * @param \TypiCMS\Modules\Events\Shells\Models\Event $event
     *
     * @return \Illuminate\View\View
     */
    public function edit(Event $event)
    {
        return view('events::admin.edit')
            ->with(['model' => $event]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \TypiCMS\Modules\Events\Shells\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormRequest $request)
    {
        $event = $this->repository->create($request->all());

        return $this->redirect($request, $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \TypiCMS\Modules\Events\Shells\Models\Event              $event
     * @param \TypiCMS\Modules\Events\Shells\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Event $event, FormRequest $request)
    {
        $this->repository->update($request->all());

        return $this->redirect($request, $event);
    }
}

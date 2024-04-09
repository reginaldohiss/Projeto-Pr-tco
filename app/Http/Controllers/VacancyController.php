<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vacancy\CreateRequest;
use App\Http\Requests\Vacancy\DeleteAllRequest;
use App\Http\Requests\Vacancy\DeleteRequest;
use App\Http\Requests\Vacancy\GetOnlyRequest;
use App\Http\Requests\Vacancy\ListRequest;
use App\Http\Requests\Vacancy\UpdateRequest;
use App\Http\Services\Vacancy;

class VacancyController extends Controller
{
    /**
     * @var true[]
     */
    private $vacancy = ['vacancy' => true];
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function home()
    {
        return view('admin.vacancy.list', $this->vacancy);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function new()
    {
        return view('admin.vacancy.new', $this->vacancy);
    }

    /**
     * @param $uuid
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit($uuid)
    {
        return view('admin.vacancy.edit', array_merge($this->vacancy, ['data' => \App\Models\Vacancy::whereUuid($uuid)->first()]));
    }
    /**
     * @param CreateRequest $request
     * @param Vacancy $service
     * @return mixed
     * @throws \Exception
     */
    public function create(CreateRequest $request, Vacancy $service)
    {
        return response()->jsonResponse($service->create($request->validated()), 200, 'success');
    }

    /**
     * @param UpdateRequest $request
     * @param Vacancy $service
     * @return mixed
     * @throws \Exception
     */
    public function update(UpdateRequest $request, Vacancy $service)
    {
        return response()->jsonResponse($service->update($request->validated()), 200, 'success');
    }

    /**
     * @param ListRequest $request
     * @param Vacancy $service
     * @return mixed
     */
    public function list(ListRequest $request, Vacancy $service)
    {
        $records = $service->list($request->validated());
        return response()->jsonResponse($records, 200, 'success');
    }

    /**
     * @param GetOnlyRequest $request
     * @param Vacancy $service
     * @return mixed
     */
    public function getOnly(GetOnlyRequest $request, Vacancy $service)
    {
        return response()->jsonResponse($service->getOnly($request->validated()), 200, 'success');
    }

    /**
     * @param DeleteRequest $request
     * @param Vacancy $service
     * @return mixed
     */
    public function delete(DeleteRequest $request, Vacancy $service)
    {
        return response()->jsonResponse($service->delete($request->validated()), 200, 'success');
    }

    /**
     * @param DeleteAllRequest $request
     * @param Vacancy $service
     * @return mixed
     */
    public function deleleAll(DeleteAllRequest $request, Vacancy $service)
    {
        return response()->jsonResponse($service->deleteAll($request->validated()), 200, 'success');
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Candidate\CreateRequest;
use App\Http\Requests\Candidate\DeleteAllRequest;
use App\Http\Requests\Candidate\DeleteRequest;
use App\Http\Requests\Candidate\GetOnlyRequest;
use App\Http\Requests\Candidate\ListRequest;
use App\Http\Requests\Candidate\UpdateRequest;
use App\Http\Services\Candidate;
use App\Models\Vacancy;

class CandidateController extends Controller
{
    /**
     * @var true[]
     */
    private $candidate = ['candidate' => true];

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function home()
    {
        return view('admin.candidate.list', $this->candidate);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function new()
    {
        $this->candidate['vacancy'] = Vacancy::all()->toArray();
        return view('admin.candidate.new', $this->candidate);
    }

    /**
     * @param $uuid
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit($uuid)
    {
        $this->candidate['vacancy'] = Vacancy::all()->toArray();
        return view('admin.candidate.edit', array_merge($this->candidate, ['data' => \App\Models\Candidate::whereUuid($uuid)->first()]));
    }

    /**
     * @param CreateRequest $request
     * @param Candidate $service
     * @return mixed
     * @throws \Exception
     */
    public function create(CreateRequest $request, Candidate $service)
    {
        return response()->jsonResponse($service->create($request->validated()), 200, 'success');
    }

    /**
     * @param UpdateRequest $request
     * @param Candidate $service
     * @return mixed
     * @throws \Exception
     */
    public function update(UpdateRequest $request, Candidate $service)
    {
        return response()->jsonResponse($service->update($request->validated()), 200, 'success');
    }

    /**
     * @param ListRequest $request
     * @param Candidate $service
     * @return mixed
     */
    public function list(ListRequest $request, Candidate $service)
    {
        $records = $service->list($request->validated());
        return response()->jsonResponse($records, 200, 'success');
    }

    /**
     * @param GetOnlyRequest $request
     * @param Candidate $service
     * @return mixed
     */
    public function getOnly(GetOnlyRequest $request, Candidate $service)
    {
        return response()->jsonResponse($service->getOnly($request->validated()), 200, 'success');
    }

    /**
     * @param DeleteRequest $request
     * @param Candidate $service
     * @return mixed
     */
    public function delete(DeleteRequest $request, Candidate $service)
    {
        return response()->jsonResponse($service->delete($request->validated()), 200, 'success');
    }

    /**
     * @param DeleteAllRequest $request
     * @param Candidate $service
     * @return mixed
     */
    public function deleleAll(DeleteAllRequest $request, Candidate $service)
    {
        return response()->jsonResponse($service->deleteAll($request->validated()), 200, 'success');
    }
}

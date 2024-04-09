<?php

namespace App\Http\Services;
use App\Models\Candidate as CandidateAlias;
use Exception;
use Illuminate\Support\Facades\DB;

class Candidate
{
    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function create(array $data): array
    {
        try{
            DB::beginTransaction();

            $data['vagas'] = json_encode($data['vaga']);
            unset($data['vaga']);
            $candidate = CandidateAlias::create($data);

            DB::commit();

            $candidate['redirect'] = route('candidate.home');
            return $candidate->toArray();
        }catch(Exception $e){
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function update(array $data): array
    {
        try{
            DB::beginTransaction();

            $data['vagas'] = json_encode($data['vaga']);
            unset($data['vaga']);
            CandidateAlias::whereUuid($data['uuid'])->update($data);

            DB::commit();

            $candidate = CandidateAlias::whereUuid($data['uuid'])->first()->toArray();
            $candidate['redirect'] = route('candidate.home');

            return $candidate;
        }catch(Exception $e){
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * @param array $data
     * @return array
     */
    public function getOnly(array $data): array
    {
        return CandidateAlias::whereUuid($data['uuid'])
            ->first()
            ->toArray();
    }

    /**
     * @param array $data
     * @return array
     */
    public function list(array $data): array
    {
        return CandidateAlias::all()->toArray();
    }

    /**
     * @param array $data
     * @return array
     */
    public function delete(array $data): array
    {
        CandidateAlias::whereUuid($data['uuid'])->delete();
        return ['deleted' => true];
    }

    /**
     * @param array $data
     * @return array
     */
    public function deleteAll(array $data): array
    {
        CandidateAlias::query()->delete();
        return ['deleted' => true];
    }
}

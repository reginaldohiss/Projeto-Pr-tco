<?php

namespace App\Http\Services;
use App\Models\Vacancy as VacancyAlias;
use Exception;
use Illuminate\Support\Facades\DB;

class Vacancy
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

            $vacancy = VacancyAlias::create($data);

            DB::commit();

            $vacancy['redirect'] = route('vacancy.home');
            return $vacancy->toArray();
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

            VacancyAlias::whereUuid($data['uuid'])->update($data);;

            DB::commit();

            $vacancy = VacancyAlias::whereUuid($data['uuid'])->first()->toArray();
            $vacancy['redirect'] = route('vacancy.home');

            return $vacancy;
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
        return VacancyAlias::whereUuid($data['uuid'])
            ->first()
            ->toArray();
    }

    /**
     * @param array $data
     * @return array
     */
    public function list(array $data): array
    {
        return VacancyAlias::when(isset($data['value']), function ($query) use ($data) {
            return $query->where(function ($q) use ($data) {
                $value = strtolower($data['value']);
                return $q->orWhereRaw('LOWER(nome) LIKE ?', ["%{$value}%"])
                    ->orWhereRaw('LOWER(regime) LIKE ?', ["%{$value}%"])
                    ->orWhereRaw('LOWER(status) LIKE ?', ["%{$value}%"]);
            });
        })->get()->toArray();
    }

    /**
     * @param array $data
     * @return array
     */
    public function delete(array $data): array
    {
        $candidates = \App\Models\Candidate::whereJsonContains('vagas', $data['uuid'])->exists();

        if($candidates)
            return ['deleted' => false, 'message' => 'Existe candidato(s) vículado(s) a essa vaga.'];

        VacancyAlias::whereUuid($data['uuid'])->delete();
        return ['deleted' => true];
    }

    /**
     * @param array $data
     * @return array
     */
    public function deleteAll(array $data): array
    {
        VacancyAlias::query()->delete();
        return ['deleted' => true];
    }
}

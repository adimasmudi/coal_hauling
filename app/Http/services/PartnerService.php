<?php

namespace App\Http\Services;

use App\Http\Repositories\PartnerRepository;
use Exception;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Illuminate\Support\Facades\Storage;

class PartnerService
{
    protected $partnerRepository;

    public function __construct(PartnerRepository $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
    }

    public function showAll(){
        return $this->partnerRepository->showAll();
    }

    public function create(){
        return $this->partnerRepository->create();
    }

    public function edit($id){
        return $this->partnerRepository->showEdit($id);
    }

    public function save($data){
        $validator = Validator::make($data,[
            'name' => 'required',
            'address' => 'max:255'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->partnerRepository->save($data);
        return $result;
    }

    public function update($data, $id){
        $validator = Validator::make($data,[
            'name' => 'required',
            'address' => 'max:255'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->partnerRepository->update($data, $id);
        return $result;
    }

    public function delete($id)
    {

        try {
            $result = $this->partnerRepository->delete($id);
        } catch (Exception $e) {
            throw new InvalidArgumentException("Error Delete Data");
        }
        return $result;

    }
}
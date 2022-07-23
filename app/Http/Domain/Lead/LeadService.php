<?php

namespace App\Http\Domain\Lead;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class LeadService
{

    use ValidatesRequests;


    private LeadRepository $leadRepository;

    public function __construct(LeadRepository $leadRepository)
    {
        $this->leadRepository = $leadRepository;
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $this->validate(request(), [
            'email' => 'required|email|min:3',
        ]);
        $email = $request->get('email');
        $from = $request->get('from');
        $store = $this->leadRepository->store($email, $from);
        if(!$store)
            return response()->json([
                'success' => false,
                'errors' => 'Erreur dans la creation'
            ]);
        return response()->json([
            'success' => true
        ]);
    }
}

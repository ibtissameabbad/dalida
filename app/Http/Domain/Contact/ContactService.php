<?php

namespace App\Http\Domain\Contact;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class ContactService
{

    use ValidatesRequests;


    private ContactRepository $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $this->validate(request(), [
            'form.name' => 'required|string|min:3|max:20',
            'form.telephone' => 'required|numeric|min:10',
            'form.email' => 'required|email|min:3',
            'form.message' => 'required|string|min:10',
        ]);
        $form = $request->get('form');
        $name = $form['name'];
        $telephone = $form['telephone'];
        $email = $form['email'];
        $message = $form['message'];
        $store = $this->contactRepository->store($name, $telephone, $email, $message);
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

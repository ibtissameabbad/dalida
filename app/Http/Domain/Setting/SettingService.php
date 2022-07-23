<?php

namespace App\Http\Domain\Setting;

use App\Models\Product;
use App\Models\Setting;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SettingService
{

    use ValidatesRequests;

    /**
     * @var SettingRepository
     */
    private SettingRepository $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function store(Request $request)
    {

        $this->validate(request(), [
            'shipping.address' => 'required',
            'shipping.area' => 'required',
            'shipping.city' => 'required',
        ]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, int $id)
    {
        $setting = Setting::findOrFail($id);
        abort_if($setting === null, 400, 'Pas de reglage');
        $this->validate(request(), [
            'instagram' => 'required',
        ]);
        $instagram = $request->get('instagram');
        $facebook = $request->get('facebook');
        $youtube = $request->get('youtube');
        $this->settingRepository->update($setting, $instagram,$facebook, $youtube);

        $request->session()->flash('status', 'Vouz avez modifier avec Succès ');
        return redirect()->route('admin-setting');
    }

}

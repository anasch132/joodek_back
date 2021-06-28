<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CatalogueController extends Controller
{
    public function index()
    {
        $catalogue = Catalogue::All();

        return response()->json(['catalogue' => $catalogue]);
    }

    public function catalogueById($id)
    {
        $catalogue = Catalogue::findOrFail($id);
        $providerInfo = DB::table('providers')->where('id', '=', $catalogue->provider_id)->where('show', '=', 'active')->first();
        $cataloguePics = DB::table('catalogue_pics')->where('catalogueId', '=', $catalogue->id)->orderBy('order', 'asc')->get();

        return response()->json(['catalogueInfo' => $catalogue, 'ProviderInfo' => $providerInfo, 'CataloguePics' => $cataloguePics]);
    }
}

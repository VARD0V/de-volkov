<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartnerRequest;
use App\Models\MaterialType;
use App\Models\Partner;
use App\Models\PartnerProduct;
use App\Models\PartnerType;
use App\Models\ProductType;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(){
        $partners = Partner::all();
        foreach($partners as $partner){
            $total = PartnerProduct::where('partner_id', $partner->id)->sum('quantity');

            $partner->discount = 0;

            if($total >= 10000 && $total < 50000){
                $partner->discount = 5;
            } else if($total >= 50000 && $total < 300000) {
                $partner->discount = 10;
            } else if($total >= 300000) {
                $partner->discount = 15;
            }
        }
        return view('partners.index', compact('partners'));
    }
    public function create(){
        $types = PartnerType::all();
        return view('partners.create', compact('types'));
    }
    public function store(PartnerRequest $request)
    {
        $partner = Partner::create($request->validated());
        return redirect()->route(route: 'partners.index');
    }
    public function edit(Partner $partner){
        //клава мышь островок - ты заглотнул огромный болт, тут типо получаем список типов и отдаем представлению
        $types = PartnerType::all();
        $partner_products = PartnerProduct::where('partner_id', $partner->id)->get();
        return view('partners.edit', compact('partner', 'types', 'partner_products'));
    }
    public function update(PartnerRequest $request, Partner $partner){
        $partner -> update($request->validated());
        return redirect()->route(route: 'partners.index');
    }
    public function history(Partner $partner){
        //клава мышь островок - ты заглотнул огромный болт, тут типо получаем список типов и отдаем представлению
        $partner_products = PartnerProduct::where('partner_id', $partner->id)->get();
        return view('partners.history', compact('partner', 'partner_products'));
    }
    //Method
    public function method_4m(ProductType $product_type, MaterialType $material_type, int $quantity, float $p1, float $p2){
        try {
            $need_quantity = p1 * p2 * $product_type->coefficient * (1 + $product_type->materialType->defective);
            return $need_quantity;
        } catch (\Exception $exception  ) {
            return -1;
        }
    }
}

@extends('layouts.app')
@section('title')
    Compare
@endsection
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumbs">
                        <li><a href="/">Home</a> </li>
                        <li class="separator"></li>
                        <li>Compare</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container padding-bottom-3x mb-1">
        <div class="card">
            <div class="card-body">
                <div class="comparison-table">
                    <table class="table table-bordered">

                        <tbody>
                            <tr class="bg-secondary">
                                <th class="text-uppercase">Summary</th>
                                @foreach ($compares as $compare)
                                         <td><span class="text-medium">{{$compare->product->name}}</span></td>
                                @endforeach
                            </tr>
                            <tr>
                                @foreach ($compares as $compare)
                                <td>
                                    <h4>
                                        {{$compare->product->name}}
                                    </h4>
                                    <p><b>{{ $compare->product->brand->name }}</b> :
                                        , <b>Price</b> : ${{ $compare->product->price }}
                                    </p>
                                </td>
                                <td>
                                    <div class="comparison-item"><span class="remove-item compare_remove"
                                            data-href="https://geniusdevs.com/codecanyon/omnimart40/compare/remove/586"><i
                                                class="icon-x"></i></span><a class="comparison-item-thumb"
                                            href="https://geniusdevs.com/codecanyon/omnimart40/product/Td5BREYLEE-facial-mask-hyaluronic-acid-facial-firming-mask-beautyca"><img
                                                src="https://geniusdevs.com/codecanyon/omnimart40/assets/images/1634134188F6gHTB1ymRhXfjsK1Rjy1Xaq6zispXad.jpg"
                                                alt="Image"></a><a class="comparison-item-title"
                                            href="https://geniusdevs.com/codecanyon/omnimart40/product/Td5BREYLEE-facial-mask-hyaluronic-acid-facial-firming-mask-beautyca">BREYLEE
                                            facial mask hyaluronic acid facial firming mask beauty</a><a
                                            class="btn btn-outline-primary btn-sm add_to_single_cart" href="javascript:;"
                                            data-target="586">Add to Cart</a></div>
                                </td>
                                @endforeach
                                
                               
                            </tr>
                            <tr>
                                <th>Product Type:</th>
                                <td>
                                    Velvet elegant sleeveless evening dress
                                </td>
                            </tr>
                            <tr>
                                <th>Material:</th>
                                <td>
                                    Polyester / Spandex
                                </td>
                            </tr>
                            <tr>
                                <th>Lining Material:</th>
                                <td>
                                    Polyester
                                </td>
                            </tr>
                            <tr>
                                <th>Fabric Type:</th>
                                <td>
                                    Fleece
                                </td>
                            </tr>
                            <tr>
                                <th>Technics:</th>
                                <td>
                                    Plain dyed
                                </td>
                            </tr>
                            <tr>
                                <th>Decoration:</th>
                                <td>
                                    Sequins
                                </td>
                            </tr>
                            <tr>
                                <th>Size:</th>
                                <td>
                                    S/M/L
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <a class="btn btn-outline-primary btn-sm btn-block add_to_single_cart"
                                        href="javascript:;" data-target="586">Add to Cart</a>
                                </td>

                            </tr>
                        </tbody>



                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

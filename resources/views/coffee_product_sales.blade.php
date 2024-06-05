<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New ☕️ Sales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <p><a href="{{route('coffee.sales')}}">Part 1</a></p>
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{route('coffee.product.store.sales')}}">
                        @csrf
                        <div>
                            <label for="product">Product</label>
                            <select id="product" name="product" required>
                                <option value="1">Gold Coffee</option>
                                <option value="2">Arabic Coffee</option>
                            </select>
                        </div>
                        <div>
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity" required>
                        </div>
                        <div>
                            <label for="unit_cost">Unit Cost</label>
                            <input type="text" id="unit_cost" name="unit_cost" required>
                        </div>
                        <button type="submit" style="background-color: #04AA6D; border: none;  color: white;
                            padding: 15px 32px;  text-align: center;  text-decoration: none;  display: inline-block;  font-size: 16px;" class="btn">Record Sale</button>
                    </form>
                    <hr>
                    <h3>Previous Sales</h3>
                    <table id="sales-table">
                        <thead>
                            <tr>
                                <th>Quantity</th>
                                <th>Unit Cost</th>
                                <th>Selling Price</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($sales->isNotEmpty())
                                @foreach($sales as $sale)
                                    <tr>
                                        <td>{{$sale->quantity}}</td>
                                        <td>{{$sale->unit_cost}}</td>
                                        <td>{{round($sale->selling_price,2)}}</td>
                                        <td>{{$sale->created_at}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

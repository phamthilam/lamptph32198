@extends('client.layouts.master')
@push('styles')
    
@endpush
@section('content')    

<div class="untree_co-section product-section before-footer-section">
    <div class="container"><div class="search mb-3">
              <input type="text" class="form-control" placeholder="Search" id="search">
              <div class="result-search" id="result-search">
  
              </div>
          </div>
          <div class="row">
        
            <center><h2 class="section-title">Tất cả sản phẩm</h2></center>
              <!-- Start Column 1 -->
              @foreach ($products as $item )
            <div class="col-12 col-md-4 col-lg-3 mb-5 mt-3">
                <a class="product-item" href="{{route('detailPro', $item->id)}}">
                    <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid product-thumbnail">
                    <h3 class="product-title">{{$item->name}}</h3>
                    <strong class="product-price">{{$item->price}}</strong>

                 <span class="icon-cross">
                          <img src="{{ asset('theme/client/assets/images/cross.svg') }}" class="img-fluid">
                    </span>
                </a>
            </div> 
              
              @endforeach

          </div>
    </div>
</div>

@endsection
<script>
  document.addEventListener('DOMContentLoaded', function() {
        let search = document.querySelector("#search");

        function debounce(func, delay) {
            let timeoutId;
            return function(...args) {
                const context = this;
                clearTimeout(timeoutId);
                timeoutId = setTimeout(() => func.apply(context, args), delay);
            };
        }

        function callAPI() {
            let url = "{{ route('searchProduct') }}";
            fetch(url, {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                method: 'POST',
                body: JSON.stringify({
                    'search': search.value
                })
            })
            .then((response) => response.json())
            .then((response) => {
                let resultUI = document.querySelector("#result-search");
                let UI = '';
                if (response.message == 'success' && response.data.length != 0) {
                    response.data.forEach(item => {
                        UI += `
                           <a href="{{route('detailPro',$item->id)}}" class="item">
                                ${item.name}
                            </a> </br>
                        `;
                    });
                } else {
                    UI = '<p>No results found</p>';
                }
                resultUI.innerHTML = UI;
            })
            .catch((error) => {
                console.error('Error:', error);
                let resultUI = document.querySelector("#result-search");
                resultUI.innerHTML = '<p>Error retrieving results</p>';
            });
        }

        search.addEventListener('keyup', debounce(() => {
            callAPI();
        }, 500));
    });
</script>
@push('scripts')
    
@endpush

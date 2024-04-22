@extends('admin')
@section('menu') active @endsection
@section('content')
<div class="card out_menu"> 
	<div>
    <form action="{{url('/update',$menuitem->id)}}" method="post" enctype="multipart/form-data" class="menu_form">
    @csrf    
    <base href= "/public">
    <div class="mb-3 ">
        <label for="dish_name" class="form-label">Dish Name:</label>
        <input type="text" id="dish_name" name="dish_name" class="navbar-search-input" value="{{$menuitem->title}}" required>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price:</label>
        <input type="number" id="price" name="price" class="navbar-search-input" value="{{$menuitem->price}}" step="0.01" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description:</label>
        <textarea id="description" name="description" class="navbar-search-input" required>{{$menuitem->description}}</textarea>
    </div>

   
    
    <div class="mb-3">
        <label for="photo" class="form-label">New Dish Photo:</label>
        <input type="file" id="photo" name="photo" class="navbar-search-input photo" accept="image/*">
    </div>

    <button type="submit" class="btn btn-update">Update</button>
</form>

</div>
<section class="section" id="offers">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 text-center">
                <div class="section-heading">
                    <h1 class="text-center">Old one</h1>
                   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row" id="tabs">
                    <div class="col-lg-12">
                        <div class="heading-tabs">
                            <div class="row">
                                <div class="col-lg-6 offset-lg-3">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <section class='tabs-content'>
                            <article id='tabs-1'>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="left-list">
                                                <div class="col-lg-12">
                                                    <div class="tab-item">
                                                        <img src="/foodimage/{{ $menuitem->image }}" alt="">
                                                        <h4>{{ $menuitem->title }}</h4>
                                                        <p>{{ $menuitem->description }}</p>
                                                        <div class="price">
                                                            <h6>${{ $menuitem->price }}</h6>
                                                        </div>
                                                        <form action="{{ route('delete_menu_item', $menuitem->id) }}" method="post">
                                                            @csrf
                                                            
                                                            
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </article>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




</div>

@endsection
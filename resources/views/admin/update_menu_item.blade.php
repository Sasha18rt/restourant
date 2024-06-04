@extends('admin')
@section('menu') active @endsection
@section('content')
<div class="card out_menu"> 
    <div>
        <form action="{{url('/update', $menuitem->id)}}" method="post" enctype="multipart/form-data" class="menu_form">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf    
            <base href="/public">
            <div class="mb-3">
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

            <div class="mb-3 select">
                <label for="dish_type" class="form-label">Dish type:</label>
                <select id="dish_type_select" name="dish_type" class="form-select" required>
                    @foreach($dishTypes as $type)
                        <option value="{{ $type->type }}" {{ ($menuitem->type == $type->type) ? 'selected' : '' }}>{{ $type->type }}</option>
                    @endforeach
                    <option value="new">Add new type</option>
                </select>
                <input type="text" id="new_dish_type" name="new_dish_type" class="form-control mt-2" style="display:none;" placeholder="New dish type">
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
            <div class="row mb-4">
                <div class="col-lg-12 ">
                    <div class="row" id="tabs">
                        <div class="col-lg-12">
                            <div class="heading-tabs">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 ">
                            <section class='tabs-content'>
                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <article id='tabs-1' data-type="{{ $menuitem->type }}">
                                            <div class="menu-card">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <img src="/foodimage/{{ $menuitem->image }}" class="card-img" alt="{{ $menuitem->title }}">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $menuitem->title }}</h5>
                                                            <p class="card-text">{{ $menuitem->description }}</p>
                                                            <div class="price">
                                                                <p>${{ $menuitem->price }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('dish_type_select').addEventListener('change', toggleNewDishTypeInput);

    function toggleNewDishTypeInput() {
        var dishTypeSelect = document.getElementById('dish_type_select');
        var newDishTypeInput = document.getElementById('new_dish_type');

        if (dishTypeSelect.value === 'new') {
            newDishTypeInput.style.display = 'block';
        } else {
            newDishTypeInput.style.display = 'none';
        }
    }

    // Initialize the toggle function on page load
    toggleNewDishTypeInput();
});
</script>

@endsection

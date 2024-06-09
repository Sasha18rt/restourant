@extends('admin')
@section('menu') active @endsection
@section('content')
<div class="card out_menu "> 
    <div>
        <form action="{{ route('submit_dish') }}" method="post" enctype="multipart/form-data" class="menu_form">
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
            <div class="dropdown-menu-item select">
                <label for="dish_type" class="form-label">Dish type:</label>
                <div class="d-flex align-items-center">
                    <select name="dish_type_id" class="form-select" id="dish_type_select">
                        @foreach($dishTypes as $type)
                            <option class="dropdown-menu-link" value="{{ $type->id }}">{{ $type->type_name }}</option>
                        @endforeach
                    </select>
                    <button type="button" id="gear_icon_btn" class="card" style="margin-left: 3px; font-size: 18px; box-shadow: none; cursor: pointer;  border: none; margin-top: 8px;">
                        <i class="fas fa-cog"></i>
                    </button>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="dish_name" class="form-label">Dish Name:</label>
                <input type="text" id="dish_name" name="dish_name" class="navbar-search-input" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" id="price" name="price" class="navbar-search-input" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea id="description" name="description" class="navbar-search-input" required></textarea>
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Dish Photo:</label>
                <input type="file" id="photo" name="photo" class="navbar-search-input  photo" accept="image/*" required>
            </div>

            <button type="submit " class="btn btn-primary ">Add Dish</button>
        </form>
       
        <div id="type_management_form" style="display:none; margin-top: 20px;">
        <div class="mid">
                        <h1>Type settings</h1>
                    </div>
            <form id="add_type_form" class="menu_form" action="{{ route('add_new_dish_type') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="new_dish_type_input" class="form-label">New Dish Type:</label>
                    <input type="text" id="new_dish_type_input" name="new_dish_type" class="navbar-search-input" placeholder="New dish type">
                </div>
                <button type="submit" id="add_new_type_btn" class="btn btn-primary">Add New Type</button>
            </form>

            <form id="delete_type_form" class="menu_form" action="{{ route('delete_dish_type') }}" method="post" enctype="multipart/form-data" style="margin-top: 20px;">
                @csrf
                <div class="mb-3">
                    <label for="delete_dish_type_select" class="form-label">Delete Dish Type:</label>
                    <select name="dish_type_id" class="form-select" id="delete_dish_type_select">
                        @foreach($dishTypes as $type)
                            <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-delete">Delete Type</button>
            </form>
        </div>
    </div>
    
    <section class="section" id="offers">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <form id="filterForm">
                        <label for="filter_dish_type_result" class="form-label">Filter by Dish type:</label>
                        <select id="filter_dish_type_result" name="filter_dish_type" class="form-select">
                            <option value="All">All</option>
                            @foreach($dishTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                            @endforeach
                        </select>
                    </form>
                    <div class="section-heading">
                        <h1>Dishes</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="tabs">
                        <div class="col-lg-12">
                            <div class="heading-tabs">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <section class='tabs-content '>
                                <div class="row ">
                                    @foreach($menu as $key => $menuItem)
                                    <div class="col-lg-6 mb-4 ">
                                        <article id='tabs-{{ $key + 1 }}' data-type="{{ $menuItem->type_id }}">
                                            <div class="menu-card">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <img src="/foodimage/{{ $menuItem->image }}" class="card-img" alt="{{ $menuItem->title }}">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $menuItem->title }}</h5>
                                                            <p class="card-text">{{ $menuItem->description }}</p>
                                                            <div class="price">
                                                                <p>${{ $menuItem->price }}</p>
                                                            </div>
                                                            <div class="d-flex">
                                                                <form action="{{ route('delete_dish', $menuItem->id) }}" method="post">
                                                                    @csrf
                                                                    <button type="submit" class=" btn-delete">Delete</button>
                                                                </form>
                                                                <a href="{{ route('edit_menu_item', $menuItem->id) }}" class=" btn-update">Update</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    @endforeach
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
    document.getElementById('filter_dish_type_result').addEventListener('change', filterMenu);
    document.getElementById('gear_icon_btn').addEventListener('click', toggleTypeManagementForm);

    function filterMenu() {
        var selectedType = document.getElementById('filter_dish_type_result').value;
        var articles = document.querySelectorAll('.tabs-content article');

        articles.forEach(function(article) {
            var dishType = article.getAttribute('data-type');

            if (selectedType === 'All' || dishType === selectedType) {
                article.style.display = 'block';
            } else {
                article.style.display = 'none';
            }
        });
    }

    function toggleTypeManagementForm() {
        var typeManagementForm = document.getElementById('type_management_form');
        typeManagementForm.style.display = (typeManagementForm.style.display === 'none' || typeManagementForm.style.display === '') ? 'block' : 'none';
    }
});
</script>


@endsection

@extends('admin')
@section('menu') active @endsection
@section('content')
<div class="card out_menu "> 
    <div >
	<form action="/submit_dish" method="post" enctype="multipart/form-data" class="menu_form">
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
    <div class="mb-3 select">
        <label for="dish_type" class="form-label">Dish type:</label>
        <select name="dish_type" class="form-select">
            <option value="Pizza">Pizza</option>
            <option value="Pasta">Pasta</option>
            <option value="Snack">Snack</option>
            <option value="Drink">Drink</option>
        </select>
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
        <input type="file" id="photo" name="photo" class="navbar-search-input photo" accept="image/*" required>
    </div>

    <button type="submit" class="btn btn-primary">Add Dish</button>
</form>

        
    </div >
    <section class="section" id="offers">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
				<form id="filterForm">
					<label for="filter_dish_type_result" class="form-label">Filter by Dish type:</label>
					<select id="filter_dish_type_result" name="filter_dish_type" class="form-select">
						<option value="All">All</option>
						<option value="Pizza">Pizza</option>
						<option value="Pasta">Pasta</option>
						<option value="Snack">Snack</option>
						<option value="Drink">Drink</option>
					</select>
				</form>
								<div class="section-heading ">
                        <h1>Result</h1>
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
                                @foreach($menu as $key => $menuItem)
                                <article id='tabs-{{ $key + 1 }}' data-type="{{ $menuItem->type }}">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="left-list">
                                                    <div class="col-lg-12">
                                                        <div class="tab-item d-flex align-items-center">
                                                            <img src="/foodimage/{{ $menuItem->image }}" alt="" class="mr-3">
                                                            <div>
                                                                <h4>{{ $menuItem->title }}</h4>
                                                                <p>{{ $menuItem->description }}</p>
                                                                <div class="price">
                                                                    <h6>${{ $menuItem->price }}</h6>
                                                                </div>
                                                                <div class="list-items">
                                                                    <form action="{{ route('delete_menu_item', $menuItem->id) }}" method="post">
                                                                        @csrf
                                                                        <a href="{{ url('/delete_menu_item', $menuItem->id) }}" type="submit" class="btn btn-delete">Delete</a>
                                                                    </form>
                                                                    <form action="{{ route('update_menu_item', $menuItem->id) }}" method="post">
                                                                        @csrf
                                                                        <a href="{{ url('/update_menu_item', $menuItem->id) }}" type="submit" class="btn btn-update">Update</a>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                @endforeach
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
});
</script>

@endsection

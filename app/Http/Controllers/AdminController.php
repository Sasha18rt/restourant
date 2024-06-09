<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use App\Models\Menu;
use App\Models\Reservation;
use App\Models\Dish;
use App\Models\DishType;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function amenu()
    {
        $menu = Dish::all();
        $dishTypes = DishType::all();
        
        return view('admin.admin_menu', compact('dishTypes', 'menu'));
    }

    public function addNewDishType(Request $request)
    {
        $request->validate([
            'new_dish_type' => 'required|string|max:255',
        ]);
    
        DishType::create([
            'type_name' => $request->new_dish_type,
        ]);
    
        return redirect()->back();
    }

    public function deleteDishType(Request $request)
    {
        $request->validate([
            'dish_type_id' => 'required|exists:dish_types,id',
        ]);
    
        $dishType = DishType::find($request->dish_type_id);
        if ($dishType) {
            $dishType->delete();
            return redirect()->back()->with('success', 'Dish type deleted successfully.');
        }
    
        return redirect()->back()->with('error', 'Failed to delete dish type.');
    }
    

    public function ausers()
    {
        $users = User::all(); 
        return view("admin.admin_users", compact("users"));
    }

    public function areservation()
    {
        $reservations = Reservation::all();
        return view('admin.admin_reservation', ['reservations' => $reservations]);
    }

    public function areviews()
    {
        $reviews = Review::all(); 
        return view('admin.admin_reviews', ['reviews' => $reviews]);
    }

    public function delete_user($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully!'); 
        } else {
            return redirect()->back()->with('error', 'User not found.'); 
        }
    }

    public function delete_reservation($id)
    {
        $reservation = Reservation::find($id);
    
        if ($reservation) {
            $reservation->delete();
            return redirect()->back()->with('success', 'Reservation deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Reservation not found.');
        }
    }

    public function deleteDish($id)
    {
        $dish = Dish::find($id);
        
        if ($dish) {
            $dish->delete();
            return redirect()->back()->with('success', 'Dish deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Dish not found.');
        }
    }

    public function update_menu_item($id)
{
    $menuitem = Dish::find($id);
    if (!$menuitem) {
        return redirect()->back()->with('error', 'Dish not found.');
    }
    $dishTypes = DishType::all();
    return view('admin.update_menu_item', compact('menuitem', 'dishTypes'));
}

    public function updateDish(Request $request, $id)
    {
        $dish = Dish::find($id);

        if (!$dish) {
            return redirect()->back()->with('error', 'Dish not found.');
        }

        $image = $request->file('photo');

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('foodimage', $imagename);
            $dish->image = $imagename;
        }

        $dish->title = $request->dish_name;
        $dish->price = $request->price;
        $dish->description = $request->description;

        if ($request->dish_type == 'new' && !empty($request->new_dish_type)) {
            $newType = new DishType();
            $newType->type_name = $request->new_dish_type;
            $newType->save();
            $dish->type_id = $newType->id;
        } else {
            $dish->type_id = $request->dish_type;
        }

        $dish->save();

        return redirect()->back()->with('success', 'Dish updated successfully.');
    }

    public function submitDish(Request $request)
    {
        $request->validate([
            'dish_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'photo' => 'required|max:2048',
            'dish_type_id' => 'required|string', 
        ]);

        if ($request->input('dish_type_id') === 'new') {
            $request->validate([
                'new_dish_type' => 'required|string|max:255',
            ]);

            $dishType = new DishType();
            $dishType->type_name = $request->input('new_dish_type');
            $dishType->save();

            $dishTypeId = $dishType->id;
        } else {
            $dishTypeId = $request->input('dish_type_id');
        }

        $dish = new Dish();
        $dish->title = $request->dish_name;
        $dish->price = $request->price;
        $dish->description = $request->description;
        $dish->type_id = $dishTypeId;

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('foodimage'), $imagename);
            $dish->image = $imagename;
        }

        $dish->save();

        return redirect()->back()->with('success', 'Dish added successfully!');
    }

    public function search_review(Request $request)
    {
        $searchTerm = $request->input('search');

        if ($searchTerm) {
            $reviews = Review::where('subject', 'like', "%{$searchTerm}%")
                             ->orWhere('email', 'like', "%{$searchTerm}%")
                             ->orWhere('message', 'like', "%{$searchTerm}%")
                             ->get();
        } else {
            $reviews = Review::all(); // No search term, retrieve all reviews
        }

        return view('admin.admin_reviews', compact('reviews')); // Pass the filtered reviews to the view
    }

    public function delete_review($id)
    {
        $review = Review::find($id);

        if ($review) {
            $review->delete();
            return redirect()->back()->with('success', 'Review deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Review not found.');
        }
    }
}

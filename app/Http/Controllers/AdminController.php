<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use App\Models\Menu;
use App\Models\Reservation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function amenu()
    {
        $menu = Menu::all();
        $dishTypes = Menu::select('type')->distinct()->get();
        return view('admin.admin_menu', compact('menu', 'dishTypes'));
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
    {$reviews = review::get(); 
        return view('admin.admin_reviews', ['reviews' => $reviews]);
        
    }

    public function delete_user($id){
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
    
    


    public function delete_menu_item($id)
    {
        $menuItem = Menu::find($id);
        
        if ($menuItem) {
            $menuItem->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function update_menu_item($id){
        $menuitem = Menu::find($id);
        $dishTypes = Menu::select('type')->distinct()->get();
        return view('admin.update_menu_item', compact('menuitem', 'dishTypes'));
    }
    
    
    
    public function update(Request $request, $id) {
        $menuitem = Menu::find($id);
    
        if (!$menuitem) {
            return redirect()->back()->with('error', 'Menu item not found.');
        }
    
        $image = $request->file('photo');
    
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('foodimage', $imagename);
            $menuitem->image = $imagename;
        }
    
        $menuitem->title = $request->dish_name;
        $menuitem->price = $request->price;
        $menuitem->description = $request->description;
        $menuitem->type = $request->dish_type;
        $menuitem->save();
    
        return redirect()->back()->with('success', 'Menu item updated successfully.');
    }
    


    public function searchUsers(Request $request)
    {
        $searchTerm = $request->input('search');

        if ($searchTerm) {
            $users = User::where('name', 'like', "%{$searchTerm}%")
                ->orWhere('email', 'like', "%{$searchTerm}%") // Add more search criteria as needed
                ->get();
        } else {
            $users = User::all(); // No search term, retrieve all users
        }

        return view('admin.admin_users', compact('users')); // Pass the filtered users to the view
    }

 
    public function submitDish(Request $request)
    {
        $request->validate([
            'dish_type' => 'required_without:new_dish_type',
            'new_dish_type' => 'required_if:dish_type,new|string|max:255',
            'dish_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $dishType = $request->input('dish_type') === 'new' ? $request->input('new_dish_type') : $request->input('dish_type');

        $menu = new Menu;
        $menu->title = $request->dish_name;
        $menu->price = $request->price;
        $menu->description = $request->description;
        $menu->type = $dishType;

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('foodimage', $imagename);
            $menu->image = $imagename;
        }

        $menu->save();

        return redirect()->back()->with('success', 'Dish added successfully!');
    }
    
    

        


    // Review

    public function search_review(Request $request)
{
  $searchTerm = $request->input('search');

  if ($searchTerm) {
    $reviews = Review::where('subject', 'like', "%{$searchTerm}%")
                   ->orWhere('email', 'like', "%{$searchTerm}%")
                   ->orWhere('message', 'like', "%{$searchTerm}%") // Add more search criteria if needed
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



// reservation



  

}

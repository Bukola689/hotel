<?php

namespace App\Repository\Admin\Item;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemRepository implements IItemRepository
{
    public function saveItem(Request $request, array $data)
    {
        $item = new Item();
        $item->type = $request->input('type');
        $item->name = $request->input('name');
        $item->cost = $request->input('cost');
        $item->detail = $request->input('detail');
        $item->save();
    }

    public function updateItem(Request $request, Item $item, array $data)
    {
        $item->type = $request->input('type');
        $item->name = $request->input('name');
        $item->cost = $request->input('cost');
        $item->detail = $request->input('detail');
        $item->update();
    }

    public function removeItem(Item $item)
    {
        $item = $item->delete();
    }
}
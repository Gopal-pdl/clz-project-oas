<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'for_what',
        'flag'
    ];
}

use Carbon\Carbon; // Make sure to include the Carbon library for date manipulation

// Step 1: Define the Week Dates
$startOfWeek = Carbon::now()->startOfWeek(); // Start date of the current week (Monday)
$endOfWeek = Carbon::now()->endOfWeek();     // End date of the current week (Sunday)

// Step 2: Retrieve Data (Assuming you have a model called 'YourModel' representing your data)
$data = Transaction::whereBetween('date', [$startOfWeek, $endOfWeek])->get();

// Step 3: Group Data by Day
$groupedData = $data->groupBy(function ($item) {
    return Carbon::parse($item->date)->format('Y-m-d');
});

// Step 4: Access Day-wise Data
foreach ($groupedData as $day => $records) {
    // $day contains the date in Y-m-d format (e.g., "2023-07-26")
    // $records is a collection containing the data for that day
    foreach ($records as $record) {
        // Access individual record properties if needed
        $record->property1; // Replace 'property1' with the actual property name
        $record->property2;
        // ...
    }
}

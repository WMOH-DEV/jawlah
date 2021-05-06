<?php

namespace App\Models\admin;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('order_number', 'like', $term)
//                ->orWhere('id', 'like', $term)
                ->orWhereHas('ticket', function ($q) use ($term) {
                    $q->where('name', 'like', $term);
                })->orWhereHas('user', function ($q) use ($term) {
                    $q->where('name', 'like', $term);
                });
        });
    } // End Search

    function arabicDate($time)
    {
        $time = Carbon::parse($time)->format('d M Y');
        $months = ["Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر"];
        $days = ["Sat" => "السبت", "Sun" => "الأحد", "Mon" => "الإثنين", "Tue" => "الثلاثاء", "Wed" => "الأربعاء", "Thu" => "الخميس", "Fri" => "الجمعة"];
        $am_pm = ['AM' => 'صباحاً', 'PM' => 'مساءً'];

        $day = $days[date('D', $time)];
        $month = $months[date('M', $time)];
        $am_pm = $am_pm[date('A', $time)];
        $date = $day . ' ' . date('d', $time) . ' - ' . $month . ' - ' . date('Y', $time) . '   ' . date('h:i', $time) . ' ' . $am_pm;
        $numbers_ar = ["٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩"];
        $numbers_en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        return str_replace($numbers_en, $numbers_ar, $date);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesUuid;
use Illuminate\Support\Facades\Storage;

class M_invitation extends Model
{
    use HasFactory, GeneratesUuid;

    protected $table = 'tb_invitations';

    protected $guarded = [];

    public $timestamps = true;

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($invitation) {
            // Hapus file yang terkait
            // cover
            $cover = $invitation->cover;
            if ($cover) {
                if ($cover->cover_image && Storage::disk('public')->exists($cover->cover_image)) {
                    Storage::disk('public')->delete($cover->cover_image);
                }
            }

            // wedding_couple
            $wedding_couple = $invitation->wedding_couple;
            if ($wedding_couple) {
                if ($wedding_couple->bride_photo && Storage::disk('public')->exists($wedding_couple->bride_photo)) {
                    Storage::disk('public')->delete($wedding_couple->bride_photo);
                }
                if ($wedding_couple->groom_photo && Storage::disk('public')->exists($wedding_couple->groom_photo)) {
                    Storage::disk('public')->delete($wedding_couple->groom_photo);
                }
            }

            // quote
            $quote = $invitation->quote;
            if ($quote) {
                if ($quote->background_image_1 && Storage::disk('public')->exists($quote->background_image_1)) {
                    Storage::disk('public')->delete($quote->background_image_1);
                }
                if ($quote->background_image_2 && Storage::disk('public')->exists($quote->background_image_2)) {
                    Storage::disk('public')->delete($quote->background_image_2);
                }
                if ($quote->background_image_3 && Storage::disk('public')->exists($quote->background_image_3)) {
                    Storage::disk('public')->delete($quote->background_image_3);
                }
            }

            // galleries
            $galleries = $invitation->galleries;
            if ($galleries && !$galleries->isEmpty()) {
                foreach ($galleries as $gallery) {
                    if ($gallery->photo && Storage::disk('public')->exists($gallery->photo)) {
                        Storage::disk('public')->delete($gallery->photo);
                    }
                }
            }

            // Hapus file di relasi audio (misalnya ada file audio)
            $audio = $invitation->audio;
            if ($audio) {
                if ($audio->audio_file && Storage::disk('public')->exists($audio->audio_file)) {
                    Storage::disk('public')->delete($audio->audio_file);
                }
            }
        });
    }

    public function transaction()
    {
        return $this->belongsTo(M_transaction::class, 'transaction_id', 'id');
    }

    public function cover()
    {
        return $this->hasOne(M_cover::class, 'invitation_id', 'id');
    }

    public function wedding_couple()
    {
        return $this->hasOne(M_wedding_couple::class, 'invitation_id', 'id');
    }

    public function quote()
    {
        return $this->hasOne(M_quote::class, 'invitation_id', 'id');
    }

    public function event()
    {
        return $this->hasOne(M_event::class, 'invitation_id', 'id');
    }

    public function love_stories()
    {
        return $this->hasMany(M_love_story::class, 'invitation_id', 'id');
    }

    public function streaming()
    {
        return $this->hasOne(M_streaming::class, 'invitation_id', 'id');
    }

    public function gifts()
    {
        return $this->hasMany(M_gift::class, 'invitation_id', 'id');
    }

    public function galleries()
    {
        return $this->hasMany(M_gallery::class, 'invitation_id', 'id');
    }

    public function audio()
    {
        return $this->hasOne(M_audio::class, 'invitation_id', 'id');
    }

    public function closing()
    {
        return $this->hasOne(M_closing::class, 'invitation_id', 'id');
    }

    public function guests()
    {
        return $this->hasMany(M_guest::class, 'invitation_id', 'id');
    }

    public function messages()
    {
        return $this->hasMany(M_message::class, 'invitation_id', 'id');
    }
}

<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EventCard extends Component
{
    public $avatarLetter;
    public $organizer;
    public $organizerRole;
    public $imageUrl;
    public $title;
    public $dateTime;
    public $location;
    public $description;
    public $eventId;
    /**
     * Create a new component instance.
     */
    public function __construct($avatarLetter, $organizer, $organizerRole, $imageUrl, $title, $dateTime, $location, $description, $eventId)
    {
        $this->avatarLetter = $avatarLetter;
        $this->organizer = $organizer;
        $this->organizerRole = $organizerRole;
        $this->imageUrl = $imageUrl;
        $this->title = $title;
        $this->dateTime = $dateTime;
        $this->location = $location;
        $this->description = $description;
        $this->eventId = $eventId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.event-card');
    }
}

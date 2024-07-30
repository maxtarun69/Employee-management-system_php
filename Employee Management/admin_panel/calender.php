<?php
class Calendar {

    private $active_year, $active_month, $active_day;
    private $events = [];

    public function __construct($date = null) {
        if ($date !== null) {
            $this->active_year = date('Y', strtotime($date));
            $this->active_month = date('m', strtotime($date));
            $this->active_day = date('d', strtotime($date));
        } else {
            $this->active_year = date('Y');
            $this->active_month = date('m');
            $this->active_day = date('d');
        }
    }

    public function add_event($txt, $date, $days = 1, $color = '') {
        $this->events[] = [
            'text' => $txt,
            'date' => $date,
            'days' => $days,
            'color' => $color
        ];
    }

    public function generate() {
        $num_days = date('t', strtotime($this->active_year . '-' . $this->active_month . '-01'));
        $num_days_last_month = date('j', strtotime('last day of previous month', strtotime($this->active_year . '-' . $this->active_month . '-01')));
        $days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        $first_day_of_week = date('w', strtotime($this->active_year . '-' . $this->active_month . '-01'));

        $html = '<div class="calendar">';
        $html .= '<div class="header">';
        $html .= '<div class="month-year">';
        $html .= date('F Y', strtotime($this->active_year . '-' . $this->active_month . '-01'));
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="days">';

        // Days of the week headers
        foreach ($days as $day) {
            $html .= '<div class="day_name">' . $day . '</div>';
        }

        // Previous month days
        for ($i = $first_day_of_week; $i > 0; $i--) {
            $html .= '<div class="day_num ignore">' . ($num_days_last_month - $i + 1) . '</div>';
        }

        // Current month days
        for ($i = 1; $i <= $num_days; $i++) {
            $selected = ($i == $this->active_day && $this->active_month == date('m') && $this->active_year == date('Y')) ? ' selected' : '';
            $html .= '<div class="day_num' . $selected . '">';
            $html .= '<span>' . $i . '</span>';
            
            foreach ($this->events as $event) {
                $event_date = date('Y-m-d', strtotime($event['date']));
                $calendar_date = date('Y-m-d', strtotime($this->active_year . '-' . $this->active_month . '-' . $i));
                
                if ($calendar_date == $event_date) {
                    $event_color = $event['color'] ? ' ' . $event['color'] : '';
                    $html .= '<div class="event' . $event_color . '">' . htmlspecialchars($event['text']) . '</div>';
                }
            }
            
            $html .= '</div>';
        }

        // Next month days
        $days_in_calendar = $first_day_of_week + $num_days;
        $total_cells = ceil($days_in_calendar / 7) * 7;
        for ($i = $days_in_calendar; $i < $total_cells; $i++) {
            $html .= '<div class="day_num ignore">' . ($i - $days_in_calendar + 1) . '</div>';
        }

        $html .= '</div>'; // .days
        $html .= '</div>'; // .calendar

        return $html;
    }

}
?>

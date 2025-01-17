<?php


namespace CTApi\Requests;


class AppointmentRequest
{
    public static function forCalendar(int $calendarId): AppointmentRequestBuilder
    {
        return new AppointmentRequestBuilder([$calendarId]);
    }

    public static function forCalendars(array $calendarIds): AppointmentRequestBuilder
    {
        return new AppointmentRequestBuilder($calendarIds);
    }
}
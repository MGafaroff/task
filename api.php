<?php
echo "salam";

// Booknetic API endpoint'leri
$servicesEndpoint = 'https://api.booknetic.com/services';
$datesEndpoint = 'https://api.booknetic.com/dates';
$timesEndpoint = 'https://api.booknetic.com/times';
$createAppointmentEndpoint = 'https://api.booknetic.com/appointments/create';

// Booknetic API'den hizmetleri alma işlevi
function getServices() {
    global $servicesEndpoint;
    return json_decode(file_get_contents($servicesEndpoint), true);
}

// Booknetic API'den tarihleri alma işlevi
function getDates($serviceId) {
    global $datesEndpoint;
    return json_decode(file_get_contents($datesEndpoint . '?service_id=' . $serviceId), true);
}

// Booknetic API'den saatleri alma işlevi
function getTimes($serviceId, $date) {
    global $timesEndpoint;
    return json_decode(file_get_contents($timesEndpoint . '?service_id=' . $serviceId . '&date=' . $date), true);
}

// Booknetic API üzerinden randevu oluşturma işlevi
function createAppointment($appointmentData) {
    global $createAppointmentEndpoint;
    
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-Type: application/json',
            'content' => json_encode($appointmentData)
        )
    );

    $context = stream_context_create($options);
    return file_get_contents($createAppointmentEndpoint, false, $context);
}

// Örnek: Hizmetleri alma ve ekrana yazdırma
$services = getServices();
print_r($services);

?>

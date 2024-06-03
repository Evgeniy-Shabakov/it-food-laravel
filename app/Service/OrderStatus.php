<?php

namespace App\Service;

class OrderStatus
{
    const CREATED = 'создан';

    const ACCEPTED = 'принят в работу';
    const COOKING = 'готовится';
    const PACKING = 'собирается';
    const WAITING_COURIER = 'ожидает курьера';
    const IN_TRANSIT = 'в пути';

    const AWAITING_PICKUP = 'готов, ожидает выдачи';

    const COMPLETED = 'завершен';



}

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

    const AWAITING_PICKUP = 'готов и ожидает выдачи';

    const COMPLETED = 'завершен';

    const CANSEL = 'отменен';

    const STATUSES_ORDER_DELIVERY = [OrderStatus::CREATED, OrderStatus::ACCEPTED, OrderStatus::COOKING,
        OrderStatus::PACKING, OrderStatus::WAITING_COURIER, OrderStatus::IN_TRANSIT, OrderStatus::COMPLETED];
}

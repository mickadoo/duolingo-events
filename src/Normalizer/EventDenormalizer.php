<?php
declare(strict_types=1);

namespace Mickadoo\DuolingoEvents\Normalizer;

use DateTime;
use Mickadoo\DuolingoEvents\Model\Event;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class EventDenormalizer extends ObjectNormalizer
{
    public function denormalize($data, string $type, string $format = null, array $context = [])
    {
        /** @var Event $event */
        $event = parent::denormalize($data, $type, $format, $context);
        if (!empty($data['start_date'])) {
            $event->setEventStart(new DateTime($data['start_date']));
        }
        if (!empty($data['start_date'])) {
            $event->setEventStartLocalTime(new DateTime($data['start_date_local']));
        }
        if (!empty($data['instructions_to_join'])) {
            $event->setInstructionToJoin($data['instructions_to_join']);
        }

        return $event;
    }

    public function supportsDenormalization($data, string $type, string $format = null)
    {
        return $type === Event::class;
    }
}
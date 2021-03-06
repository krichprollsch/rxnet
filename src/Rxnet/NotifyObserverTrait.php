<?php
namespace Rxnet;

use Rx\ObserverInterface;

trait NotifyObserverTrait
{
    public function notifyCompleted() {
        array_walk($this->observers, function(ObserverInterface $observer) {
            $observer->onCompleted();
        });
    }
    public function notifyNext($data) {
        array_walk($this->observers, function(ObserverInterface $observer) use($data) {
            $observer->onNext($data);
        });
    }
    public function notifyError($e) {
        array_walk($this->observers, function(ObserverInterface $observer) use($e) {
            $observer->onError($e);
        });
    }
}
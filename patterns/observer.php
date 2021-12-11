<?php

// https://fr.wikipedia.org/wiki/Observateur_(patron_de_conception)


/**
 * PHP has a couple of built-in interfaces related to the Observer pattern.
 *
 * Here's what the Subject interface looks like:
 *
 * @link http://php.net/manual/en/class.Subject.php
 */
      interface ISubject
      {
          // Attach an observer to the subject.
          public function attach(IObserver $observer);
 
          // Detach an observer from the subject.
          public function detach(IObserver $observer);
 
          // Notify all observers about an event.
          public function notify();
      }
 /*
 * There's also a built-in interface for Observers:
 *
 * @link http://php.net/manual/en/class.Observer.php
 */
      interface IObserver
      {
          public function update(Subject $subject);
      }
 

/**
 * The Subject owns some important state and notifies observers when the state
 * changes.
 */
class Subject implements ISubject
{
    /**
     * @var int For the sake of simplicity, the Subject's state, essential to
     * all subscribers, is stored in this variable.
     */
    public $state;

    /**
     * @var SplObjectStorage List of subscribers. In real life, the list of
     * subscribers can be stored more comprehensively (categorized by event
     * type, etc.).
     */
    private $observers;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    /**
     * The subscription management methods.
     */
    public function attach(IObserver $observer)
    {
        echo "Subject: Attached an observer.\n";
        $this->observers->attach($observer);
    }

    public function detach(IObserver $observer)
    {
        $this->observers->detach($observer);
        echo "Subject: Detached an observer.\n";
    }

    /**
     * Trigger an update in each subscriber.
     */
    public function notify()
    {
        echo "Subject: Notifying observers...\n";
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * Usually, the subscription logic is only a fraction of what a Subject can
     * really do. Subjects commonly hold some important business logic, that
     * triggers a notification method whenever something important is about to
     * happen (or after it).
     */
    public function someBusinessLogic()
    {
        echo "\nSubject: I'm doing something important.\n";
        $this->state = rand(0, 10);

        echo "Subject: My state has just changed to: {$this->state}\n";
        $this->notify();
    }
}

/**
 * Concrete Observers react to the updates issued by the Subject they had been
 * attached to.
 */
class ConcreteObserverA implements IObserver
{
    public function update(Subject $subject)
    {
        if ($subject->state < 3) {
            echo "ConcreteObserverA: Reacted to the event.\n";
        }
    }
}

class ConcreteObserverB implements IObserver
{
    public function update(Subject $subject)
    {
        if ($subject->state == 0 || $subject->state >= 2) {
            echo "ConcreteObserverB: Reacted to the event.\n";
        }
    }
}

/**
 * The client code.
 */

$subject = new Subject();

$o1 = new ConcreteObserverA();
$subject->attach($o1);echo"<br>";

$o2 = new ConcreteObserverB();
$subject->attach($o2);echo"<br>";

$subject->someBusinessLogic();echo"<br>";
$subject->someBusinessLogic();echo"<br>";

$subject->detach($o2);echo"<br>";

$subject->someBusinessLogic();echo"<br>";
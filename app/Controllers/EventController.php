<?php

namespace App\Controllers;

use App\Models\EventModel;
use CodeIgniter\API\ResponseTrait;

class EventController extends BaseController
{
    public function display_event()
    {
        $event = new eventmodel();

        $data = [];
        $data['main_content'] = 'Pages/Event';
        // $data['events'] = $eventModel->getAllEvents();
        $data['events'] = $event->findAll(); // Fetch all records from 'events' table

        $data['isFooter'] = False;

        return view('InnerPages/template', $data); // Pass data to the view
    }

    public function event()
    {
        $eventModel = new eventmodel();
        $data = [];
        $data['main_content'] = 'Pages/Event';
        $data['events'] = $eventModel->getAllEvents();
        $data['isFooter'] = False;

        return view('InnerPages/template', $data);
    }
    public function index()
    {
        $data = [];
        $data['main_content'] = 'Pages/create_event_form';
        $data['isFooter'] = False;

        return view('InnerPages/template', $data);
    }

    use ResponseTrait;

    public function deleteEvent($id = null)
    {
        $eventModel = new eventmodel();
        $event = $eventModel->find($id);

        if ($event) {
            // unlink('./uploads/' . $event->image);
            $eventModel->delete($id);

            return redirect()->to('event');
        } else {
            return $this->failNotFound('Event not found');
        }
    }
    public function editEvent($id)
    {
        $data = [];
        $eventModel = new eventmodel();
        $event = $eventModel->find($id);
        $data['main_content'] = 'Pages/edit_event';
        $data['data'] = $event;
        $data['isFooter'] = False;

        return view('Pages/edit_event', $data);
    }

    public function update($id)
    {

        $model = new eventmodel();
        if ($this->request->getMethod() == 'put') {

            $existingRecord = $model->find($id);

            if (!$existingRecord) {

                return redirect()->to('/event')->with('message', 'Record not found');
            }

            $image = $this->request->getFile('image');
            $fileName = $image->getRandomName();
            $image->move('./uploads/', $fileName);

            $data = [
                'event_name' => $this->request->getPost('event_name'),
                'event_disc' => $this->request->getPost('event_disc'),
                'image' => $fileName,
                'event_date' => $this->request->getPost('event_date'),

            ];
            if ($model->update($id, $data)) {
                return redirect()->to('/event');
            } else {
                return redirect()->to('/create_event_form');
            }
        }

        $data['record'] = $model->find($id);

        if (!$data['record']) {

            return redirect()->to('/reclame')->with('message', 'Record not found');
        }
        return redirect()->to(base_url('/list-reclame'));
    }


    public function saveEvent()
    {
        $eventsModel = new eventModel();

        if ($this->request->getMethod() === 'post') {
            $image = $this->request->getFile('image');
            $fileName = $image->getRandomName();
            $image->move('./uploads/', $fileName);

            $data = [
                'event_name' => $this->request->getVar('event_name'),
                'event_disc' => $this->request->getVar('event_disc'),
                'image' => $fileName,
                'event_date' => $this->request->getVar('event_date'),

            ];

            $eventsModel->insert($data);

            return redirect()->to('/');
        }
    }
}

<?php

namespace App\Services;


use App\Enum\EnumRole;
use App\Repositories\AppointmentRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentService extends BaseService
{
    protected $repository;

    public function __construct(
        AppointmentRepository $repository,
        UserService           $userService
    )
    {
        $this->repository = $repository;
        $this->userService = $userService;
    }

    /**
     * @param Request|array $request
     * @return Model
     */
    public function save(Request|array $request): Model
    {
        $params = $request->all();
        if (empty($params['user_id'])) {
            $newUser = $this->userService->getRepository()->save([
                'name' => $params['person_name'],
                'role' => EnumRole::CLIENTE->value
            ]);
            $params['user_id'] = $newUser->id;
        }
        return parent::save($params);
    }


    /**
     * @param $params
     * @param array $with
     * @return mixed
     */
    public function getAll($params, $with = []): mixed
    {
        return parent::getAll($params, ['user', 'animalType', 'appointmentDoctor.user']);
    }

    public function find(int|string $id, array $with = []): Model|Builder
    {
        return parent::find($id, ['user']);
    }

    public function delete(int|string $id): void
    {
        $appointment = $this->find($id);
        if ($appointment->appointmentDoctor()->exists()) {
            throw new \Exception('Existe o vínculo entre médico e o agendamento.');
        }

        $userLogged = Auth::user();

        if ($userLogged->role === EnumRole::CLIENTE->value) {
            throw new \Exception('Cliente não pode excluir nenhum agendamento');
        }

        if ($userLogged->role === EnumRole::MEDICO->value) {
            throw new \Exception('Médico veterinário não pode excluir nenhum agendamento');
        }

        parent::delete($id);
    }
}

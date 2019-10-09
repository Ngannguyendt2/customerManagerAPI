<?php


namespace App\Http\Services\Impl;


use App\Http\Repositories\CustomerRepository;
use App\Http\Services\CustomerService;

class CustomerServiceImpl implements CustomerService
{
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
        $customers = $this->customerRepository->getAll();
        return $customers;
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
        $customer = $this->customerRepository->findById($id);
        $statusCode = 200;
        if (!$customer) {
            $statusCode = 404;
        }
        $data = [
            'customer' => $customer,
            'statusCode' => $statusCode
        ];
        return $data;
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
        $customer = $this->customerRepository->findById($id);
        $statusCode = 400;
        $message = 'Data not found';
        if ($customer) {
            $this->customerRepository->destroy($customer);
            $statusCode = 200;
            $message = 'Delete success';
        }
        $data=[
            'statusCode'=>$statusCode,
            'message'=>$message
        ];
        return $data;
    }

    public function update($request, $id)
    {
        // TODO: Implement update() method.
        $oldCustomer=$this->customerRepository->findById($id);
        if(!$oldCustomer){
            $customer=null;
            $statusCode=404;
        }
        else{
            $customer=$this->customerRepository->update($request,$oldCustomer);
            $statusCode=200;
        }
        $data=[
            'customer'=>$customer,
            'statusCode'=>$statusCode
        ];
        return $data;
    }

    public function create($request)
    {
        // TODO: Implement create() method.
        $customer = $this->customerRepository->create($request);

        $statusCode = 201;
        if (!$customer)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'customers' => $customer
        ];

        return $data;
    }
}

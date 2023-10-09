<?
namespace App\Services;

use App\SdkNicoPay\Main\Main as GlobalSdkNicoPay;

class NicoPayService {

	private $sdk;
	private $sessionToken;

	public function __construct()
	{
		$this->sdk = new GlobalSdkNicoPay(env('NICO_PAY_API_KEY'));
		$this->sessionToken = null;
	}

	public function getTokenAuth($user, $password)
	{
		// Autenticación y obtención de un token de sesión
		$token = $this->sdk->getSessionToken($user, $password);
		$this->sessionToken = $token;
	}
	
	public function createPlan($name, $amount, $frequency)
	{
		if ($this->sessionToken) {
			// Crear un plan
			$planData = [
				'name' => $name,
				'amount' => $amount,
				'frequency' => $frequency
			];
			return $this->sdk->createPlan($planData);
		} else {
			return [
				'error' => 'Ocurrio Un Error de autenticacion'
			];
		}
	}

	public function createSubscription($planId, $userId)
	{
		if ($this->sessionToken) {
			// Crear una suscripción
			$subscriptionData = [
				'plan_id' => $planId,
				'user_id' => $userId, // ID del usuario
			];
			return $this->sdk->createSubscription($subscriptionData);
		} else {
			return [
				'error' => 'Ocurrio Un Error de autenticacion'
			];
		}
	}

	public function paymentIntent($amount, $userId)
	{
		if ($this->sessionToken) {
			// Realizar un pago directo
			$paymentData = [
				'amount' => $amount,
				'user_id' => $userId, // ID del usuario
			];
			return $this->sdk->makePayment($paymentData);	
		} else {
			return [
				'error' => 'Ocurrio Un Error de autenticacion'
			];
		}
	}
}
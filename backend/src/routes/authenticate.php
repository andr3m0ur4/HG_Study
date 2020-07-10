<?php

    use Slim\Http\Request;
    use Slim\Http\Response;
    use App\Models\User;
    use Firebase\JWT\JWT;

    // Rotas para geração de token
    $app->post('/api/token', function(Request $request, Response $response) {

        $data = $request->getParsedBody();

        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;
        $key = array_key_first($data);

        $user = User::where($key, $email);

        if (!is_null($user) && $password === $user->password) {

            // gerar token
            $secretKey = $this->get('settings')['secretKey'];
            $keyAccess = JWT::encode($user, $secretKey);

            return $response->withJson([
                'key' => $keyAccess
            ]);

        }

        return $response->withJson([
            'status' => 'error'
        ]);
    });

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\PuntajeModel;
use phpseclib\Crypt\RSA;

class JuegosController extends Controller
{
    public function index() {
        return view('juegos.index');
    }

    public function pruebaIndex() {
        $puntaje = PuntajeModel::where('id_usuario', auth()->user()->id)->first();


        return view('juegos.prueba', ['puntaje' => $puntaje]);
    }


    function encryptMessage($publicKey, $message) {
        $rsa = new RSA();
        $rsa->loadKey($publicKey);
        $encrypted = $rsa->encrypt($message);
        return base64_encode($encrypted);
    }

    // Función para desencriptar un mensaje utilizando la clave privada
    function decryptMessage($privateKey, $encryptedMessage) {
        $rsa = new RSA();
        $rsa->loadKey($privateKey);
        $encrypted = base64_decode($encryptedMessage);
        $decrypted = $rsa->decrypt($encrypted);
        return $decrypted;
    }

    public function prueba(Request $request)
    {
        try {
            // Ejemplo de uso
            $publicKey = '-----BEGIN PUBLIC KEY-----
            MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAsK8wW9kgC+hMwi1h+Lv5
            F7WDBSG/99GgeMfC+GeSSCOZ2QIl8qTQGmUQs65PFM1fzcepOfR2Bwo+xnj7JeVm
            CwkLG6NVWTjC++t+D97XEppWsEN1szplD84vTqzhcT5CKo7yZ0YB6rrXEn3tK4WI
            QacaPRuEv7poCoSMXoPnrhibs/NM5okWVUOQanxFgdedxDhuMaOfzOQMDBmg7IXs
            e80kdf0Oc4HdmnH+8oQr4ISeFx6ssWtP2JjQJ5eNmkfcr+vH59xH+h/h83X6gfbE
            WP/XPxJRzF92LinLvmwxvz2GqyNMU+q6veSvNHVfe5tqWjEVcADQ0OR1tOsQHzc9
            DQIDAQAB
            -----END PUBLIC KEY-----';

            $privateKey = '-----BEGIN PRIVATE KEY-----
            MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQCwrzBb2SAL6EzC
            LWH4u/kXtYMFIb/30aB4x8L4Z5JII5nZAiXypNAaZRCzrk8UzV/Nx6k59HYHCj7G
            ePsl5WYLCQsbo1VZOML7634P3tcSmlawQ3WzOmUPzi9OrOFxPkIqjvJnRgHqutcS
            fe0rhYhBpxo9G4S/umgKhIxeg+euGJuz80zmiRZVQ5BqfEWB153EOG4xo5/M5AwM
            GaDshex7zSR1/Q5zgd2acf7yhCvghJ4XHqyxa0/YmNAnl42aR9yv68fn3Ef6H+Hz
            dfqB9sRY/9c/ElHMX3YuKcu+bDG/PYarI0xT6rq95K80dV97m2paMRVwANDQ5HW0
            6xAfNz0NAgMBAAECggEABMLiffslf1n7euPFBzJY6wAPyjsyWeU1hUO21+xXQhKU
            Mlz536Z8MCs8jmcFB7W6yPLCN0cEnjnIXsoC/0QFt7LpmyKlPxIF7nWBEGrsJ1AZ
            mXGRR1WXGccFOddz/NIAGkxUsR6Zwx+qrOYlVnNTAcKVH66b6XHGciVycJfujfUI
            LGChgdCMid9rgJWsq6Wt1Bm2p+83ozueC3qcwQf95CR0dSp+xIJsG/77n53iN7N/
            G+6qSXVxZse4bYsOxCoRnQWnpiFSdkIIVsquYZQbm8tX07tKrhgYydwXaq6NFOY1
            LAa9qNdhXgVlCBgLehGruu5vBVa1S8PF/IsOcGZKeQKBgQDb/En7sLLXMHSmLtz6
            YIgOtvD/UnPPE5YtqxOZ23d3Xc0lIHjZ1TM8Z1WFqVgDt1KjsqIERSk6VTwVnMWO
            KMkywLdPg6oruTNWJLQQTL3w6eHbPLNOEJ5wEqwQup8Vwn75XjDUyNzKb5+x8M+w
            TQH1kJedJzBDjlpKK9oqLpCtxQKBgQDNnB/bjVtGXddmmjP0Y6MB2c1ny8TwGfaa
            ResqVHXhiPlNjiCrF9K5u5iDM2FOba3LwIE3YJ3PwhXUDVdJOo6g+3/MEqOxN84I
            C9QLlQBpcFsyleR4HITGxNzQ8qD+QT3DM5GZV3gozbfYYybEac26nbowHlWQOSsI
            NJaPXGDOqQKBgD6Fa3lu9MUX7m80rnUybjjQYZoPEv7tcCc2kfGOYFu6ew1sNyyh
            3Vfzfmjogi08Mu53XHieN2Nuyg7SaYtHqDcWcoLUxs56ak63S72+MdWAg0JN9B/h
            tUXg6Kowf/otNu0kifhPxgB6zQZDjKNsn3vtRknR03O/x4WBBRYr+c6JAoGBAKLn
            oSIeFIRjE6gaYzGtw9hSjflALLAjkgxXe2SVeLSSBxyYkG+et3orFUJWcjFmmv3F
            b1vF9CNI3mydiVvexmTr/yxcVE+0LEyZuo7WpnXj7I3ezx8PUW//SAlRQ5dPb7T6
            ZdC9ydlibNhIbs3OGo9SKtO3JQnZEaw1pli904HJAoGBANOi1I5+NP5Wsn6LLrv+
            4j1Ya0rRRWKwjIr5JVPqCq4dk2Bt866tQx1PgIynVqwqi8McHsYvVntNAjXMeWjg
            DmWM+XyGiNQA8k52CMgYYHxz/TPeM7CsWmTxDns3SToDpnGnHcMrWMFIbMV8nDq2
            NnOGQltqNqjKz5Fxa2fvZX2I
            -----END PRIVATE KEY-----';

            $message = 'Hola, esto es un mensaje encriptado';

            $encryptedMessage = $this->encryptMessage($publicKey, $message);
            echo "Mensaje encriptado: " . $encryptedMessage . "<br>";

            $decryptedMessage = $this->decryptMessage($privateKey, $encryptedMessage);
            echo "Mensaje desencriptado: " . $decryptedMessage;
        } catch (\Exception $e) {
            // Manejar el error
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

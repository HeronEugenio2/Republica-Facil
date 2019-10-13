<?php

namespace App\Http\Controllers;

use App\Models\Republic;
use App\Models\User;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function index()
    {
        return view('test');
    }

    /**
     * Upload of images
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function uploadImage(Request $request)
    {
        $user = User::where('id', auth()->id())->first();
        $republic = $user->republic;
        $nameRandom = $this->str_random(20);
        if (($_FILES['my_file']['name'] != "")) {
            // Where the file is going to be stored
            $prefix = str_replace(' ', '', $user->republic->name) . '-';
            $target_dir = "images/";
            $file = $_FILES['my_file']['name'];
            $path = pathinfo($file);
            $filename = $prefix . $nameRandom;//$path['filename'];
            $ext = $path['extension'];
            $temp_name = $_FILES['my_file']['tmp_name'];
            $path_filename_ext = $target_dir . $filename . "." . $ext;
            // Check if file ja existe
            if (file_exists($path_filename_ext)) {
                $message = "Sorry, file already exists.";
            } else {
                move_uploaded_file($temp_name, $path_filename_ext);
                $message = "Congratulations! File Uploaded Successfully.";
                $republic->image = '/' . $path_filename_ext;
                $republic->save();
            }
        }
        return view('test', compact('message'));
    }

    /**
     * Gera string aleatória
     * @param $length
     * @return string
     */
    public function str_random($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function perfil()
    {
        $user = User::where('id', auth()->id())->first();
        return view('Painel.User.Perfil', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::where('id', auth()->id())->first();
        $data = $request->except('_token');
        $phone = str_replace('(', '', $request->phone);
        $phone = str_replace(')', '', $phone);
        $phone = str_replace(' ', '', $phone);
        $phone = str_replace('-', '', $phone);
        $data['phone'] = $phone;
        $user->update([
            "image" => $request->image,
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $phone,
        ]);
        $user->save();
        return view('Painel.User.Perfil', compact('user'));
    }

    public function testRepublicStore(Republic $republic)
    {
    }

    /**
     *
     */
    public function republicStore()
    {
        $data = [
            'name' => 'Republica Liberdade',
            'email' => 'republicafacil@gmail.com.br',
            'description' => 'Temos cinco membros, três quartos, uma cozinha, um banheiro, lavanderia e área externa. Tarefas divididas entre os membros da república, sujeito à multa do não cumprimento das tarefas. Horário para afazeres não deve ultrapassar as onze horas e não aceitamos dumar dentro de casa.',
            'qtdMembers' => 5,
            'qtdVacancies' => 1,
            'value' => 130.00,
            'type_id' => 1,  // foreignkey
            'user_id' => 1, // foreignkey
            'street' => 'Av. General Afonseca',
            'district' => 'Manejo',
            'cep' => 27520 - 172,
            'city' => 'Resende',
            'state' => 'Rio de Janeiro',
            'number' => 993,
            'up' => 13,
            'down' => 1,
        ];
        Republic::updateOrCreate($data);
    }

    public function exportTxt()
    {
        $textContent = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.'; // custom contents
        $txtfile = $_SERVER["DOCUMENT_ROOT"] . "/download/export_links.txt";
        $handle = fopen($txtfile, 'w') or die('Cannot open file:  ' . $txtfile); // check the file is readable
        fwrite($handle, $textContent); // write content
        fclose($handle); // close the text file
        return $downLink = 'download/download.php?f=export_links.txt'; // text file download hyperlink
    }

    public function export()
    {
        header('Content-Type: application/download');
        header('Content-Disposition: attachment; filename="example.csv"');
        header("Content-Length: " . filesize("example.csv"));

        $fp = fopen("example.csv", "r");
        fpassthru($fp);
        fclose($fp);
    }
}

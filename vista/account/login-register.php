<?php
session_start();
define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpass', '');
define('dbname', 'vetdog');

try {
    $connect = new PDO("mysql:host=" . dbhost . "; dbname=" . dbname, dbuser, dbpass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

if (isset($_POST['login'])) {
    $errMsg = '';
    $correo = $_POST['correo'];
    $contra = $_POST['contra'];

    if ($correo == '') {
        $errMsg = 'Digite su correo';
    }

    if ($contra == '') {
        $errMsg = 'Digite su contraseña';
    }

    if ($errMsg == '') {
        try {
            $stmt = $connect->prepare('SELECT id_due, nom_due, ape_due, correo, contra, cargo FROM owner WHERE correo = :correo');
            $stmt->execute(array(':correo' => $correo));
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($data == false) {
                $errMsg = "Usuario $correo no encontrado.";
            } else {
                if (password_verify($contra, $data['contra'])) {
                    $_SESSION['id_due'] = $data['id_due'];
                    $_SESSION['nom_due'] = $data['nom_due'];
                    $_SESSION['ape_due'] = $data['ape_due'];
                    $_SESSION['correo'] = $data['correo'];
                    $_SESSION['cargo'] = $data['cargo'];
                    if ($_SESSION['cargo'] == 2) {
                        header('Location: ../shop/shop');
                    }
                    exit;
                } else {
                    $errMsg = 'Contraseña incorrecta.';
                }
            }
        } catch (PDOException $e) {
            $errMsg = $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="es">

<head lang="es-ES">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./../../assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="./../../assets/js/init-alpine.js"></script>
    <script src="./../../assets/js/tailwindcss.js"></script>
    <title>Iniciar Sesión | Vetdog</title>
</head>

<body>
    <main class="flex items-center min-h-screen p-6" style="background-color: rgb(248 250 252);">
        <section class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl"
            style="background-color: #1a1c23;">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <article class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="hidden object-cover w-full h-full" style="display: block;"
                        src="./../../assets/img/icon.png" alt="admin icon" draggable="false" />
                </article>

                <article class="flex items-center justify-center p-6 sm:p-12 md:w-1/2" style="background-color: #fff;">
                    <div class="w-full">
                        <form class="container" autocomplete="off" method="POST">
                            <h1 class="mb-4 text-xl font-semibold text-gray-700">Iniciar Sesión</h1>
                            <?php
                            if (isset($errMsg))
                                echo '<div style="color:#FF0000;text-align:center;font-size:20px;">' . $errMsg . '</div>';
                            ?>
                            <label class="block text-sm">
                                <span class="text-gray-700">Correo electrónico <span
                                        style="font-size: 1.1rem;color:#ff0000db">*</span></span>
                                <input
                                    class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                    placeholder="Digite su correo electrónico..." name="correo"
                                    value="<?php if (isset($_POST['correo']))
                                        echo $_POST['correo'] ?>"
                                        autocomplete="off" type="email" required />
                                </label>
                                <label class="block mt-4 text-sm">
                                    <span class="text-gray-700">Contraseña <span
                                            style="font-size: 1.1rem;color:#ff0000db">*</span></span>
                                    <input
                                        class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                        placeholder="*****" type="password" name="contra"
                                        value="<?php if (isset($_POST['contra']))
                                        echo $_POST['contra'] ?>" minlength="5"
                                        required />
                                </label>
                                <hr class="my-8" />
                                <button
                                    class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg hover:border-gray-500 focus:border-gray-500 focus:outline-none focus:shadow-outline-gray"
                                    name='login' type="submit" style="background-color: rgb(6 182 212)">Acceder</button>
                            </form>
                            <div id="msg_error" class="alert alert-danger" role="alert" style="display: none"></div>
                            <div class="text-center mt-3">
                                <span class="text-sm text-teal-700">¿Nuevo usuario?</span>
                                <a href="./register.php"
                                    class="text-sm text-teal-700 underline decoration-solid">Registrarse</a>
                                <hr style="border: transparent;">
                                <a href="./../" class="text-sm text-teal-700 underline decoration-solid">Regresar al
                                    inicio</a>
                            </div>
                        </div>
                    </article>
                </div>
            </section>
        </main>
    </body>

    </html><?php
session_start();
define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpass', '');
define('dbname', 'vetdog');

try {
    $connect = new PDO("mysql:host=" . dbhost . "; dbname=" . dbname, dbuser, dbpass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

if (isset($_POST['login'])) {
    $errMsg = '';
    $correo = $_POST['correo'];
    $contra = $_POST['contra'];

    if ($correo == '') {
        $errMsg = 'Digite su correo';
    }

    if ($contra == '') {
        $errMsg = 'Digite su contraseña';
    }

    if ($errMsg == '') {
        try {
            $stmt = $connect->prepare('SELECT id_due, nom_due, ape_due, correo, contra, cargo FROM owner WHERE correo = :correo');
            $stmt->execute(array(':correo' => $correo));
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($data == false) {
                $errMsg = "Usuario $correo no encontrado.";
            } else {
                if (password_verify($contra, $data['contra'])) {
                    $_SESSION['id_due'] = $data['id_due'];
                    $_SESSION['nom_due'] = $data['nom_due'];
                    $_SESSION['ape_due'] = $data['ape_due'];
                    $_SESSION['correo'] = $data['correo'];
                    $_SESSION['cargo'] = $data['cargo'];
                    if ($_SESSION['cargo'] == 2) {
                        header('Location: ../shop/shop');
                    }
                    exit;
                } else {
                    $errMsg = 'Contraseña incorrecta.';
                }
            }
        } catch (PDOException $e) {
            $errMsg = $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="es">

<head lang="es-ES">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./../../assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="./../../assets/js/init-alpine.js"></script>
    <script src="./../../assets/js/tailwindcss.js"></script>
    <title>Iniciar Sesión | Vetdog</title>
</head>

<body>
    <main class="flex items-center min-h-screen p-6" style="background-color: rgb(248 250 252);">
        <section class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl"
            style="background-color: #1a1c23;">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <article class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="hidden object-cover w-full h-full" style="display: block;"
                        src="./../../assets/img/icon.png" alt="admin icon" draggable="false" />
                </article>

                <article class="flex items-center justify-center p-6 sm:p-12 md:w-1/2" style="background-color: #fff;">
                    <div class="w-full">
                        <form class="container" autocomplete="off" method="POST">
                            <h1 class="mb-4 text-xl font-semibold text-gray-700">Iniciar Sesión</h1>
                            <?php
                            if (isset($errMsg))
                                echo '<div style="color:#FF0000;text-align:center;font-size:20px;">' . $errMsg . '</div>';
                            ?>
                            <label class="block text-sm">
                                <span class="text-gray-700">Correo electrónico <span
                                        style="font-size: 1.1rem;color:#ff0000db">*</span></span>
                                <input
                                    class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                    placeholder="Digite su correo electrónico..." name="correo"
                                    value="<?php if (isset($_POST['correo']))
                                        echo $_POST['correo'] ?>"
                                        autocomplete="off" type="email" required />
                                </label>
                                <label class="block mt-4 text-sm">
                                    <span class="text-gray-700">Contraseña <span
                                            style="font-size: 1.1rem;color:#ff0000db">*</span></span>
                                    <input
                                        class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                                        placeholder="*****" type="password" name="contra"
                                        value="<?php if (isset($_POST['contra']))
                                        echo $_POST['contra'] ?>" minlength="5"
                                        required />
                                </label>
                                <hr class="my-8" />
                                <button
                                    class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg hover:border-gray-500 focus:border-gray-500 focus:outline-none focus:shadow-outline-gray"
                                    name='login' type="submit" style="background-color: rgb(6 182 212)">Acceder</button>
                            </form>
                            <div id="msg_error" class="alert alert-danger" role="alert" style="display: none"></div>
                            <div class="text-center mt-3">
                                <span class="text-sm text-teal-700">¿Nuevo usuario?</span>
                                <a href="./register.php"
                                    class="text-sm text-teal-700 underline decoration-solid">Registrarse</a>
                                <hr style="border: transparent;">
                                <a href="./../" class="text-sm text-teal-700 underline decoration-solid">Regresar al
                                    inicio</a>
                            </div>
                        </div>
                    </article>
                </div>
            </section>
        </main>
    </body>

    </html>
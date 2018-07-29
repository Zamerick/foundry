<?php

if (!function_exists('template_path')) {
    /**
     * Get the path to the template folder.
     *
     * @param  string  $path
     * @return string
     */
    function template_path($path = '')
    {
        $path = rtrim($path, '/');

        return app_path('Templates') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}

if (!function_exists('package_root')) {
    /**
     * Get the root of the package.
     *
     * @return string
     */
    function package_root()
    {
        if (File::exists('composer.json')) {
            return getcwd();
        } else {
            die($this->error('Composer.json not found. Unable to determine root of package. Please use '
            . config('app.name') .
            ' in the top level directory. (Where the composer.json is located)'));
        }
    }
}

if (!function_exists('current_timestamp')) {
    /**
     * return the current date and timestamp
     *
     * @return string
     */
    function current_timestamp()
    {
        return date('Y_m_d_His');
    }
}

if (!function_exists('make_directory')) {
    /**
     * Build the directory for the class if necessary.
     *
     * @param  string  $path
     * @return string
     */
    function make_directory($path, $files)
    {
        if (!$files->isDirectory(dirname($path))) {
            $files->makeDirectory(dirname($path), 0777, true, true);
        }

        return $path;
    }
}

if (!function_exists('get_directory_config')) {
    /**
     * Get the user configured dir for given type,
     * or return the default one if no user configured one is set.
     *
     * @param  string  $path
     * @return string
     */
    function get_directory_config($type)
    {
        if (empty(config('package.directories.' . strtolower($type)))) {
            $path = config('package.default-directories.' . strtolower($type));
        } else {
            $path = config('package.directories.' . strtolower($type));
        }

        return $path;
    }
}

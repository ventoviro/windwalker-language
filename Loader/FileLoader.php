<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2008 - 2014 Asikart.com. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Windwalker\Language\Loader;

/**
 * Class FileLoader
 *
 * @since {DEPLOY_VERSION}
 */
class FileLoader extends AbstractLoader
{
	const MIN          = 0;
	const LOW          = 100;
	const BELOW_NORMAL = 200;
	const NORMAL       = 300;
	const ABOVE_NORMAL = 400;
	const HIGH         = 500;
	const MAX          = 600;

	/**
	 * Property name.
	 *
	 * @var  string
	 */
	protected $name = 'file';

	/**
	 * Property paths.
	 *
	 * @var  null
	 */
	protected $paths = null;

	/**
	 * Constructor.
	 *
	 * @param \SplPriorityQueue|string[] $paths
	 * @param int                        $priority
	 */
	public function __construct($paths = array(), $priority = self::NORMAL)
	{
		if (!($paths instanceof \SplPriorityQueue))
		{
			$queue = new \SplPriorityQueue;

			foreach ((array) $paths as $path)
			{
				$queue->insert($path, $priority);
			}
		}

		$this->paths = $paths;
	}

	/**
	 * load
	 *
	 * @param string $file
	 *
	 * @throws \RuntimeException
	 * @return  null|string
	 */
	public function load($file)
	{
		if (!is_file($file))
		{
			if (!$file = $this->findFile($file))
			{
				throw new \RuntimeException(sprintf('Language file: %s not found.', $file));
			}
		}

		return file_get_contents($file);
	}

	/**
	 * findFile
	 *
	 * @param string $file
	 *
	 * @return  boolean|string
	 */
	protected function findFile($file)
	{
		foreach (clone $this->paths as $path)
		{
			$filePath = $path . '/' . $file;

			if (is_file($filePath))
			{
				return $filePath;
			}
		}

		return false;
	}
}


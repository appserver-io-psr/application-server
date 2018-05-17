<?php

/**
 * AppserverIo\Psr\ApplicationServer\ServiceInterface
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2018 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io-psr/application-server
 * @link      http://www.appserver.io
 */

namespace AppserverIo\Psr\ApplicationServer;

use AppserverIo\Psr\ApplicationServer\Configuration\SystemConfigurationInterface;
use AppserverIo\Psr\ApplicationServer\Configuration\ContainerConfigurationInterface;

/**
 * This interface defines the basic method each API service has
 * to provide.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2018 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io-psr/application-server
 * @link      http://www.appserver.io
 */
interface ServiceInterface
{

    /**
     * Returns the initial context instance.
     *
     * @return \AppserverIo\Psr\ApplicationServer\ContextInterface The initial Context
     */
    public function getInitialContext();

    /**
     * Returns the servers tmp directory, append with the passed directory.
     *
     * @param \AppserverIo\Psr\ApplicationServer\Configuration\ContainerConfigurationInterface $containerNode        The container to return the temporary directory for
     * @param string                                                                           $relativePathToAppend A relative path to append
     *
     * @return string
     */
    public function getTmpDir(ContainerConfigurationInterface $containerNode, $relativePathToAppend = '');

    /**
     * Returns the servers deploy directory.
     *
     * @param \AppserverIo\Psr\ApplicationServer\Configuration\ContainerConfigurationInterface $containerNode        The container to return the deployment directory for
     * @param string                                                                           $relativePathToAppend A relative path to append
     *
     * @return string
     */
    public function getDeployDir(ContainerConfigurationInterface $containerNode, $relativePathToAppend = '');

    /**
     * Returns the servers webapps directory.
     *
     * @param \AppserverIo\Psr\ApplicationServer\Configuration\ContainerConfigurationInterface $containerNode        The container to return the temporary directory for
     * @param string                                                                           $relativePathToAppend A relative path to append
     *
     * @return string
     */
    public function getWebappsDir(ContainerConfigurationInterface $containerNode, $relativePathToAppend = '');

    /**
     * Returns the servers log directory.
     *
     * @param string $relativePathToAppend A relative path to append
     *
     * @return string
     */
    public function getLogDir($relativePathToAppend = '');

    /**
     * Allows to set the system configuration.
     *
     * @param \AppserverIo\Psr\ApplicationServer\Configuration\SystemConfigurationInterface $systemConfiguration The system configuration
     *
     * @return ServiceInterface
     */
    public function setSystemConfiguration(SystemConfigurationInterface $systemConfiguration);

    /**
     * Returns the system configuration.
     *
     * @return \AppserverIo\Psr\ApplicationServer\Configuration\SystemConfigurationInterface The system configuration
     */
    public function getSystemConfiguration();

    /**
     * Returns all nodes.
     *
     * @return array An array with all nodes
     */
    public function findAll();

    /**
     * Returns the node with the passed UUID.
     *
     * @param integer $uuid UUID of the node to return
     *
     * @return \AppserverIo\Configuration\Interfaces\NodeInterface The node with the UUID passed as parameter
     */
    public function load($uuid);
}

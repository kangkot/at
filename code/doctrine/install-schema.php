<?php

$metadata = $em->getMetadataFactory()->getAllMetadata();
$schema = new \Doctrine\ORM\Tools\SchemaTool($em);
$schema->dropSchema($metadata); # copy with care
$schema->createSchema($metadata);

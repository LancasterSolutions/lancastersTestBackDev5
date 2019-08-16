<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TestController extends Controller
{
    /**
     * @Route("/test", name="test-page", method="GET")
     */
    public function testAction(Request $request)
    {
        $user_first_name = $request->query->has("first_name") ? $request->query->has("first_name") : '';
        $user_last_last = $request->query->has("last_name") ? $request->query->has("last_name") : '';
        $user_age = $request->query->has("age") ? $request->query->has("age") : '';

        $em = $this->getDoctrine()->getManager();
        $new_user = new Users();
        $new_user->setFirstName($user_first_name);
        $new_user->setLastName($user_last_last);
        $new_user->setAge($user_age);

        $em->persist($new_user);
        $em->flush();


        return $this->render('test/test.html.twig', [
          'user_first_name' => $user_first_name,
          'user_last_name' => $user_last_last,
          'user_age' => $user_age,
        ]);
    }
}
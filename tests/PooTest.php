<?php 

namespace Tests;

use Poo\Models\User;
use PHPUnit\Framework\TestCase;

/**
 * Poo Test Class
 * 
 * @author Adebayo H. <hountondjigodwill@gmail.com>
 */
class PooTest extends TestCase 
{

   use \Tests\Helpers\TestTrait;


    /**
     * @test
     * 
     * Check the property pasword 
     * 
     * @return int|  testIfPropertyPasswordIsPrivate's note| 
     */
    public function testPropertyPasswordExistance()
    {
        $this->increasePoints(2);
        $user = new User;

        try {
            $this->assertArrayHasKey('password', $user->getAllProperties());
            $this->increaseNote(1);
        } catch (\Exception $ex) {
            return $this->sendError(
                '@todo-property',
                'Ajouter la propriété password à la classe User',
                null,
                '★'
            );
        }

        return 1;

    }

    /**
     * Check if property password is private
     * 
     * @test 
     * 
     * @depends testPropertyPasswordExistance
     * 
     * @param int $note The note value to increase if test is valid
     * 
     * @return void
     */
    public function testIfPropertyPasswordIsPrivate(int $note)
    {

        $isPrivate = false;
        $user = new User; 

        try {
            echo $user->password;
        } catch (\Error $ex) {
            $isPrivate = true;
        }

        try {
            $this->assertTrue($isPrivate);
            $this->increaseNote($note);
        } catch (\Exception $ex) {
            $this->sendError(
                '@todo-property',
                'La propriété password de la classe user doit être privée',
                null,
                '★'
            );
        }

    }

    /**
     * @test 
     * 
     * Check if model user extends of DefaultModel
     * 
     * @return void
     */
    public function testIfModelUserExtendsDefaultModel()
    {
        $this->increasePoints(1);
        try {
            $this->assertArrayHasKey('Poo\Helpers\DefaultModel', class_parents(User::class, true));
            $this->increaseNote(1);
        } catch (\Exception $e) {
            $this->sendError(
                '@todo-heritage',
                'La classe User doit hériter la classe DefaultModel',
                null,
                '★'
            );
        }
    }

    /**
     * @test
     * 
     * Check if class default model is nstantiable
     * 
     * @return void
     */
    public function testIfClassDefaultModelIsInstantiable()
    {
        // $this->expectException(\Error::class);
        $isInstantiable = true;

        try {
            $moldel = new \Poo\Helpers\DefaultModel;
        } catch (\Error $err) {
            $isInstantiable = false;
        }

        try {
            $this->assertFalse($isInstantiable);
        } catch (\Exception $ex) {
            $this->sendError(
                '@todo-cannotInstance',
                'La class DefaultModel ne doit pas être instanciable',
                null,
                '★'
            );
        }

    }

    /**
     * @test
     * 
     * Check if model User use ModelTrait
     * 
     * @return void
     */
    public function testIfUserModelUseModelTrait()
    {
        $this->increasePoints(1);
        try {
            $this->assertArrayHasKey('Poo\Helpers\ModelTrait', class_uses(User::class, true));
            $this->increaseNote(1);
        } catch (\Exception $ex) {
            $this->sendError(
                '@todo-useTrait',
                'La classe User doit utiliser le trait ModelTrait',
                null,
                '★'
            );
        }
    }

    /**
     * @test
     * 
     * Test if the function anotherUserLessFunction of ModelTrait has public access
     * 
     * @return void
     */
    public function testAnotherUserLessFunctionAccess()
    {
        $this->increasePoints(1);

        try {
           (new User)->anotherUserLessFunction();
           $isPublic = true;
        } catch (\Error $err) {
            if (preg_match('/Call to private method/', $err->getMessage())) {
                $error = $err->getMessage();
                $isPublic = false;              
            }
        }

        try {
            $this->assertTrue($isPublic);
            $this->increaseNote(1);
        } catch (\Exception $ex) {
            $this->sendError(
                '@todo-methodAccess',
                'La méthode anotherUserLessFunction() du trait ModelTrait doit être accessible hors des la classe utilisant le trait',
                null,
                '★'
            ); 
        }

    }

    /**
     * @test
     * 
     * Check method say hello to friend return value
     * 
     * @return void
     */
    public function testMethodSayHelloToFriendReturnCorrectValue()
    {
        $this->increasePoints(2);
        try {
            $this->assertSame((new User)->sayHelloToFriend('Adebayo'), 'Brontis dit bonjour à Adebayo');
            $this->increaseNote(2);
        } catch (\Exception $e) {
            $this->sendError(
                '@todo-sayHello',
                'Si le paramètre entré est Adebayo la fonction doit retourner: Brontis dit bonjour à Adebayo',
                null,
                '★ ★'
            );
        }
    }

    /**
     * @test 
     * 
     * Check if method sayHelloToFriend() parameter is typed
     * 
     * @return void
     */
    public function testIfMethodSayHelloToFriendParamIsTyped()
    {
        $this->increasePoints(2);

        try {
            (new User)->sayHelloToFriend(['Adebayo']);
            $isTyped = false;
        } catch (\Error $err) {
            $isTyped = true;
        } catch (\Exception $ex) {
            $isTyped = false;
        } 

        try {
            $this->assertTrue($isTyped);
            $this->increaseNote(2);
        } catch (\Exception $ex) {
            $this->sendError(
                '@todo-sayHello',
                'Obliger la fonction à reçevoir en paramètre une chaîne de caractère du même type que celle définit dans sa php doc',
                null,
                '★ ★'
            );
        }

    }

    /**
     * @test
     * 
     * Check if the model user implement UserInterface
     * 
     * @return void
     */
    public function testIfModelUserImplementUserInterface()
    {
        $this->increasePoints(1);
        try {
            $this->assertArrayHasKey('Poo\Helpers\UserInterface', class_implements(User::class, true));
            $this->increaseNote(1);
        } catch (\Exception $ex) {
            $this->sendError(
                '@todo-useInterface',
                'La classe user doit implémenter la classe UserInterface',
                null,
                '★'
            );
        }
    }

    /**
     * @test
     * 
     * @dataProvider getterTestDataProvider
     * 
     * @param string $field The field to test
     * @param mixed $value The field value
     * @return void
     */
    public function testUserGettersWorksProperly($field, $value)
    {
        $this->increasePoints(2);
        $user   = new User;
        $getter = 'get' . implode('', array_map('ucfirst', explode('_', $field)));
        // Check
        try {
            $this->assertSame($user->$getter(), $value);
            $this->increaseNote(2);
        } catch (\Exception $ex) {
            $this->sendError(
                '@todo-assesseur',
                'L\'assesseur ' . $getter . '() ne retourne pas la valeur de la propriété ' . $field,
                null,
                '★ ★'
            );
        }
    }

    /**
     * Generate data to testUserGettersWorksProperly()
     * 
     * @return array List of data
     */
    public function getterTestDataProvider()
    {
        return [
            ['lastname', 'Gilloux'],
            ['firstname', 'Brontis'],
            ['email', 'email@email.com']
        ];
    }

    /**
     * @test
     * 
     * @dataProvider userDataProvider
     * 
     * @param string $field The field to update
     * @param mixed $value The field value
     * @return void
     */
    public function testUserSettersWorksProperly(string $field, $value)
    {
        $this->increasePoints(3);
        $user   = new User;
        $setter = 'set' . implode('', array_map('ucfirst', explode('_', $field)));
        $getter = 'get' . implode('', array_map('ucfirst', explode('_', $field)));
        // Set fields
        $user->$setter($value);
        // Check 
        try {
            $this->assertSame($value, $user->$getter());
            $this->increaseNote(3);
        } catch (\Exception $ex) {
            $this->sendError(
                '@todo-mutateur',
                "Le mutateur {$setter}() ne modifie pas la propriété {$field} de la classe User",
                null,
                '★ ★ ★',
                'Si vous avez des erreurs @todo-assesseur terminez les avant de résoudre celle-ci'
            );
        }

    }

    /**
     * Generate data to testUserSettersWorksProperly()
     * 
     * @return array List of data
     */
    public function userDataProvider()
    {
        return [
            ['lastname', 'HOUNTONDJI'],
            ['firstname', 'Adebayo'],
            ['email', 'hountondjigodwill@gmail.com']
        ];
    }

}

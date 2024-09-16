import { createNativeStackNavigator } from '@react-navigation/native-stack';
import { NavigationContainer } from '@react-navigation/native';
import LoginScreen from './screens/LoginScreen';
import HomeScreen from './screens/HomeScreen';
import CameraScreen from './screens/CameraScreen';
import RegisterScreen from './screens/RegisterScreen';
import AuthContext from './contexts/AuthContexts';
import { loadUser } from './services/AuthServices';
import { useState, useEffect } from 'react';
import SplashScreen from './screens/SplashScreen';

const Stack = createNativeStackNavigator();

export default function App() {
  const [user, setUser] = useState(null);
  const [status, setStatus] = useState("loading");

  useEffect(() => {
    async function runEffect() {
      try {
        const user = await loadUser();
        setUser(user);
        console.log(user);
      } catch (e) {

      }
      setStatus("idle");
    }

    runEffect();
  }, []);

  if (status === "loading") {
    return <SplashScreen />
  }
  return (
    <AuthContext.Provider value={{ user, setUser }}>
      <NavigationContainer>
        <Stack.Navigator>
          {user ? (
            <>
              <Stack.Screen name="Scanner" component={CameraScreen} />
              <Stack.Screen name="Home" component={HomeScreen} />
            </>
          ) : (
            <>
              <Stack.Screen name="Login" component={LoginScreen} />
              <Stack.Screen name="Register" component={RegisterScreen} />
            </>
          )}
        </Stack.Navigator>
      </NavigationContainer>
    </AuthContext.Provider>
  );
}

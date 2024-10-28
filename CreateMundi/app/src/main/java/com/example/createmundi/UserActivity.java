package com.example.createmundi;

import android.os.Bundle;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;
import com.example.createmundi.Model.ModelUser;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class UserActivity extends AppCompatActivity {
    public ListView Lista;

    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_usuarios);
        Lista = findViewById(R.id.Listagem);
        RequestQueue queue = Volley.newRequestQueue(UserActivity.this);
        String url = "http://10.0.2.2/trabalho/createmundi/API/usuario/lista/";
        JsonObjectRequest request = new JsonObjectRequest(Request.Method.GET, url, null, new Response.Listener<JSONObject>() {
            @Override
            public void onResponse(JSONObject response) {
                String user, Mundos, Faccoes, Personagens;
                List<ModelUser> user1 = new ArrayList<>();
                try {
                    JSONArray Usuarios = response.getJSONArray("dados");
                    for (int i = 0; i < Usuarios.length(); i++) {
                        JSONObject Usuario = (JSONObject) Usuarios.get(i);
                        user = Usuario.getString("username");
                        Mundos = Usuario.getString("numMundos");
                        Faccoes = Usuario.getString("numFaccoes");
                        Personagens = Usuario.getString("numPersonagens");
                        ModelUser User = new ModelUser(user, Mundos, Faccoes, Personagens);
                        user1.add(User);
                    }
                    GetUsuarioByUsername(user1);
                } catch (JSONException e) {
                    throw new RuntimeException(e);
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                String Erro = error.getMessage();
                Toast.makeText(UserActivity.this, Erro, Toast.LENGTH_SHORT).show();
            }
        });
        queue.add(request);
    }
    public void GetUsuarioByUsername(List<ModelUser> lista){
        ArrayAdapter arrayAdapter = new ArrayAdapter(UserActivity.this, android.R.layout.simple_list_item_1, lista);
        Lista.setAdapter(arrayAdapter);
    }
}

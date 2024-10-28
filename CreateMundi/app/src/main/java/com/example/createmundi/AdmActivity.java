package com.example.createmundi;

import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;


public class AdmActivity extends AppCompatActivity {
    private Button Buscar, Adm;
    private EditText Username;
    private ListView UserGet;
    private String Buffer;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_adm);
        Username = findViewById(R.id.textView);
        UserGet = findViewById(R.id.Listagem);
        Buscar = findViewById(R.id.BuscaUser);
        Adm = findViewById(R.id.TurnAdm);

        Buscar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v)
                {
                    if (Username.getText().length() != 0) {
                        RequestQueue queue = Volley.newRequestQueue(AdmActivity.this);
                        String url = "http://10.0.2.2/trabalho/createmundi/API/usuario/lista/" + Username.getText().toString();
                        JsonArrayRequest request = new JsonArrayRequest(Request.Method.GET, url, null, new Response.Listener<JSONArray>() {
                            @Override
                            public void onResponse(JSONArray response) {
                                String user , Mundos , Faccoes, Personagens;
                                List<String> user1 = new ArrayList<>();
                                try {
                                    JSONObject usuario = response.getJSONObject(0);
                                    if (usuario.length() > 1) {
                                        Buffer=Username.getText().toString();
                                        user = usuario.getString("username");
                                        Mundos = "Mundos: "+usuario.getString("numMundos");
                                        Faccoes = "Faccoes: "+ usuario.getString("numFaccoes");
                                        Personagens = "Personagens: "+usuario.getString("numPersonagens");
                                        user1.add(user);
                                        user1.add(Mundos);
                                        user1.add(Faccoes);
                                        user1.add(Personagens);
                                        GetUsuarioByUsername(user1);
                                        Adm.setVisibility(View.VISIBLE);
                                    }
                                    else {
                                        user = usuario.getString("username");
                                        Toast.makeText(AdmActivity.this, user, Toast.LENGTH_SHORT).show();
                                        user1.clear();
                                        GetUsuarioByUsername(user1);
                                        Adm.setVisibility(View.GONE);
                                    }
                                } catch(JSONException e){
                                    e.printStackTrace();
                                }

                            }
                        }, new Response.ErrorListener()
                            {
                                @Override
                                public void onErrorResponse(VolleyError error) {
                                    String Erro = error.getMessage();
                                    Toast.makeText(AdmActivity.this, Erro, Toast.LENGTH_SHORT).show();
                                }
                            }
                        );
                        queue.add(request);

                    } else {
                        Toast.makeText(AdmActivity.this, "Informe um usuário", Toast.LENGTH_SHORT).show();
                        List<String> user1 = new ArrayList<>();
                        GetUsuarioByUsername(user1);
                        Adm.setVisibility(View.GONE);
                    }
                }

        });
        Adm.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view){
                String url = "http://10.0.2.2/trabalho/createmundi/API/usuario/update/" + Buffer;
                StringRequest request = new StringRequest(Request.Method.POST, url,
                        new Response.Listener<String>() {
                            @Override
                            public void onResponse(String response) {
                                Toast.makeText(AdmActivity.this, Buffer+" agora é um administrador", Toast.LENGTH_SHORT).show();
                            }
                        }, new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        String Erro = error.getMessage();
                        Toast.makeText(AdmActivity.this, Erro, Toast.LENGTH_SHORT).show();
                    }
                }){
                    protected Map<String, String> getParams () throws AuthFailureError {
                        Map<String, String> params = new HashMap<>();
                        params.put("_method", "PUT");
                        params.put("adm", "1");
                        return params;
                    }
                };
                RequestQueue queue = Volley.newRequestQueue(AdmActivity.this);
                queue.add(request);
            }
        });
    }
    public void GetUsuarioByUsername(List<String> lista){
        ArrayAdapter arrayAdapter = new ArrayAdapter(AdmActivity.this, android.R.layout.simple_list_item_1, lista);
        UserGet.setAdapter(arrayAdapter);
    }
}
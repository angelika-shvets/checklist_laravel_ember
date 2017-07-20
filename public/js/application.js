/**
 * Created by angelika on 7/18/17.
 */
// window.Todos = Ember.Application.create();
// Todos.ApplicationAdapter = DS.FixtureAdapter.extend();
window.Todos = Ember.Application.create();

Todos.ApplicationAdapter = DS.LSAdapter.extend({
    namespace: 'todos-emberjs'
});
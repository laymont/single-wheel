// stores/useTicketStore.js
import { defineStore } from 'pinia';
import { ref, computed } from 'vue';

export const useTicketStore = defineStore('ticketStore', () => {
    // Estado reactivo para los tickets disponibles y vendidos
    const availableTickets = ref([]);
    const soldTickets = ref([]);

    // Acciones para mutar el estado
    const setAvailableTickets = (tickets) => {
        availableTickets.value = tickets;
    };

    const addSoldTicket = (ticket) => {
        soldTickets.value.push(ticket);
        availableTickets.value = availableTickets.value.filter(t => t !== ticket);
    };

    const removeSoldTicket = (ticket) => {
        soldTickets.value = soldTickets.value.filter(t => t !== ticket);
        availableTickets.value.push(ticket);
    };

    // Getters computados
    const availableCount = computed(() => availableTickets.value.length);
    const soldCount = computed(() => soldTickets.value.length);

    return {
        availableTickets,
        soldTickets,
        setAvailableTickets,
        addSoldTicket,
        removeSoldTicket,
        availableCount,
        soldCount,
    };
});
